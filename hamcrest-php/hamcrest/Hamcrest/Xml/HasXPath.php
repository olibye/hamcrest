<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/DiagnosingMatcher.php';
require_once 'Hamcrest/Matcher.php';
require_once 'Hamcrest/Core/IsEqual.php';

/**
 * Matches if array size satisfies a nested matcher.
 */
class Hamcrest_Xml_HasXPath extends Hamcrest_DiagnosingMatcher
{

  private $_xpath;

  private $_matcher;

  public function __construct($xpath, Hamcrest_Matcher $matcher=null)
  {
    $this->_xpath = $xpath;
    $this->_matcher = $matcher;
  }

  /**
   * Matches if the XPath matches against the DOM node.
   *
   * @param DOMNode $actual
   * @param Hamcrest_Description $mismatchDescription
   * @return bool
   */
  protected function matchesWithDiagnosticDescription($actual,
      Hamcrest_Description $mismatchDescription)
  {
    if (is_string($actual))
    {
      $actual = $this->createDocument($actual);
    }
    elseif (!$actual instanceof DOMNode)
    {
      $mismatchDescription->appendText('was ')->appendValue($actual);
      return false;
    }
    $results = $this->evaluate($actual);
    if ($results instanceof DOMNodeList)
    {
      return $this->matchesContent($results, $mismatchDescription);
    }
    elseif ($this->_matcher === null || $this->_matcher->matches($results))
    {
      return true;
    }
    else
    {
      $this->_matcher->describeMismatch($results, $mismatchDescription);
      return false;
    }
  }

  protected function createDocument($actual)
  {
    $document = new DOMDocument();
    if (preg_match('/^\s*<\?xml/', $actual))
    {
      if (!@$document->loadXML($actual))
      {
        throw new InvalidArgumentException(
            'Must pass a valid XML document');
      }
    }
    else
    {
      if (!@$document->loadHTML($actual))
      {
        throw new InvalidArgumentException(
            'Must pass a valid HTML or XHTML document');
      }
    }
    return $document;
  }

  protected function evaluate(DOMNode $actual)
  {
    if ($actual instanceof DOMDocument)
    {
      $xpathDocument = new DOMXPath($actual);
      return $xpathDocument->evaluate($this->_xpath);
    }
    else
    {
      $xpathDocument = new DOMXPath($actual->ownerDocument);
      return $xpathDocument->evaluate($this->_xpath, $actual);
    }
  }

  protected function matchesContent(DOMNodeList $results,
      Hamcrest_Description $mismatchDescription)
  {
    if ($results->length == 0)
    {
      $mismatchDescription->appendText('XPath returned no results');
    }
    elseif ($this->_matcher === null)
    {
      return true;
    }
    else
    {
      foreach ($results as $node)
      {
        if ($this->_matcher->matches($node->textContent))
        {
          return true;
        }
      }
      $content = array();
      foreach ($results as $node)
      {
        $content[] = $node->textContent;
      }
      $mismatchDescription->appendText('was ')
                          ->appendValue($content);
    }
    return false;
  }

  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText('XML or HTML document with XPath "')
                ->appendText($this->_xpath)
                ->appendText('"');
    var_dump($this->_matcher);
    if ($this->_matcher !== null)
    {
      $description->appendText(' ');
      $this->_matcher->describeTo($description);
    }
  }

  /**
   * An array with elements that match the given matchers.
   */
  public static function hasXPath($xpath, $matcher=null)
  {
    if ($matcher === null || $matcher instanceof Hamcrest_Matcher)
    {
      return new self($xpath, $matcher);
    }
    elseif (is_int($matcher) && strpos($xpath, 'count(') !== 0)
    {
      $xpath = 'count(' . $xpath . ')';
    }
    return new self($xpath, Hamcrest_Core_IsEqual::equalTo($matcher));
  }

}

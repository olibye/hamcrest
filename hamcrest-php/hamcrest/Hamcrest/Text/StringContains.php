<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/Text/SubstringMatcher.php';

/**
 * Tests if the argument is a string that contains a substring.
 */
class Hamcrest_Text_StringContains extends Hamcrest_Text_SubstringMatcher
{

  private $_ignoreCase;
  
  public function __construct($substring, $ignoreCase=false)
  {
    parent::__construct($substring);

    $this->_ignoreCase = $ignoreCase;
  }

  public function ignoringCase()
  {
    $this->_ignoreCase = true;
    return $this;
  }
  
  public static function containsString($substring)
  {
    return new self($substring, false);
  }

  public static function containsStringIgnoringCase($substring)
  {
    return new self($substring, true);
  }
  
  // -- Protected Methods
  
  protected function evalSubstringOf($item)
  {
    if ($this->_ignoreCase)
    {
      return (false !== stripos((string) $item, $this->_substring));
    }
    else
    {
      return (false !== strpos((string) $item, $this->_substring));
    }
  }
  
  protected function relationship()
  {
    return $this->_ignoreCase ? 'containing in any case' : 'containing';
  }
  
}

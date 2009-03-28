<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/BaseMatcher.php';
require_once 'Hamcrest/Description.php';

/**
 * Tests if the value contains a series of substrings in a constrained order.
 */
class Hamcrest_Text_StringContainsInOrder extends Hamcrest_BaseMatcher
{
  
  private $_substrings;
  
  public function __construct(array $substrings)
  {
    $this->_substrings = $substrings;
  }
  
  public function matches($item)
  {
    if (!is_string($item) &&
      !(is_object($item) && method_exists($item, '__toString')))
    {
      return false;
    }
    
    $fromIndex = 0;
    
    foreach ($this->_substrings as $substring)
    {
      if (false === $fromIndex = strpos($item, $substring, $fromIndex))
      {
        return false;
      }
    }
    
    return true;
  }
  
  public function descibeMismatch($item,
    Hamcrest_Description $mismatchDescription)
  {
    $mismatchDescription->appendText('was ')->appendValue($item);
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText('a string containing ')
                ->appendValueList('', ', ', '', $this->_substrings)
                ->appendText(' in order')
                ;
  }
  
  /**
   * @hamcrest(factory)
   */
  public static function stringContainsInOrder(array $substrings)
  {
    return new self($substrings);
  }
  
}

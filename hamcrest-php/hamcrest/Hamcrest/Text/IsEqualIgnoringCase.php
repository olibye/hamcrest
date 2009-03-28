<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/BaseMatcher.php';
require_once 'Hamcrest/Description.php';

/**
 * Tests if a string is equal to another string, regardless of the case.
 */
class Hamcrest_Text_IsEqualIgnoringCase extends Hamcrest_BaseMatcher
{
  
  private $_string;
  
  public function __construct($string)
  {
    $this->_string = $string;
  }
  
  public function matches($item)
  {
    if (!is_string($item) &&
      !(is_object($item) && method_exists($item, '__toString')))
    {
      return false;
    }
    
    return strtolower($this->_string) === strtolower($item);
  }
  
  public function describeMismatch($item,
    Hamcrest_Description $mismatchDescription)
  {
    $mismatchDescription->appendText('was ')->appendValue($item);
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText('equalToIgnoringCase(')
                ->appendValue($this->_string)
                ->appendText(')')
                ;
  }
  
  /**
   * @hamcrest(factory)
   */
  public static function equalToIgnoringCase($string)
  {
    return new self($string);
  }
  
}

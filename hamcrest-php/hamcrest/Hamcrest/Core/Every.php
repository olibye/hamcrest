<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/DiagnosingMatcher.php';
require_once 'Hamcrest/Description.php';
require_once 'Hamcrest/Matcher.php';

class Hamcrest_Core_Every extends Hamcrest_DiagnosingMatcher
{
  
  private $_matcher;
  
  public function __construct(Hamcrest_Matcher $matcher)
  {
    $this->_matcher = $matcher;
  }
  
  public function matchesWithDiagnosticDescription($items,
    Hamcrest_Description $mismatchDescription)
  {
    if (!is_array($items) && !($items instanceof Iterator))
    {
      $items = array($items);
    }
    
    foreach ($items as $item)
    {
      if (!$this->_matcher->matches($item))
      {
        $mismatchDescription->appendText('an item ');
        $this->_matcher->describeMismatch($item, $mismatchDescription);
        
        return false;
      }
    }
    
    return true;
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText('every item is ')->appendDescriptionOf($this->_matcher);
  }
  
  /**
   * @param Hamcrest_Matcher $itemMatcher
   *   A matcher to apply to every element in an array.
   * 
   * @return Hamcrest_Core_Every
   *   Evaluates to TRUE for a collection in which every item matches $itemMatcher
   */
  public static function everyItem(Hamcrest_Matcher $itemMatcher)
  {
    return new self($itemMatcher);
  }
  
}

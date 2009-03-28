<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/BaseMatcher.php';
require_once 'Hamcrest/Description.php';

/**
 * Is the value a number equal to a value within some range of
 * acceptable error?
 */
class Hamcrest_Number_IsCloseTo extends Hamcrest_BaseMatcher
{
  
  private $_value;
  private $_delta;
  
  public function __construct($value, $delta)
  {
    $this->_value = $value;
    $this->_delta = $delta;
  }
  
  public function matches($item)
  {
    if (!is_numeric($item))
    {
      return false;
    }
    
    return $this->_actualDelta($item) <= 0.0;
  }
  
  public function describeMismatch($item,
    Hamcrest_Description $mismatchDescription)
  {
    $mismatchDescription->appendValue($item)
                        ->appendText(' differed by ')
                        ->appendValue($this->_actualDelta($item))
                        ;
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText('a numeric value within ')
                ->appendValue($this->_delta)
                ->appendText(' of ')
                ->appendValue($this->_value)
                ;
  }
  
  public static function closeTo($value, $delta)
  {
    return new self($value, $delta);
  }
  
  // -- Private Methods
  
  private function _actualDelta($item)
  {
    $item = is_numeric($item)
      ? $item
      : 0
      ;
    return (abs(($item - $this->_value)) - $this->_delta);
  }
  
}

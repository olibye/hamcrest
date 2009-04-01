<?php

require_once 'Hamcrest/DiagnosingMatcher.php';
require_once 'Hamcrest/Description.php';

/**
 * Convenient base class for Matchers that require a value of a specific type.
 * This simply checks the type and then casts.
 */
abstract class Hamcrest_TypeSafeDiagnosingMatcher
  extends Hamcrest_DiagnosingMatcher
{
  
  /* Types that PHP can compare against */
  const TYPE_STRING = 1;
  const TYPE_NUMERIC = 2;
  const TYPE_ARRAY = 3;
  const TYPE_OBJECT = 4;
  const TYPE_RESOURCE = 5;
  const TYPE_BOOLEAN = 6;
  
  /** The type that is required for a safe comparison */
  private $_expectedType;
  
  public function __construct($expectedType)
  {
    $this->_expectedType = $expectedType;
  }
  
  protected function matchesWithDiagnosticDescription($item,
    Hamcrest_Description $mismatchDescription)
  {
    return $this->_isSafeType($item)
      && $this->matchesSafelyWithDiagnosticDescription($item, $mismatchDescription);
  }
  
  public function describeMismatch($item,
    Hamcrest_Description $mismatchDescription)
  {
    if (!$this->_isSafeType($item))
    {
      parent::describeMismatch($item, $mismatchDescription);
    }
    else
    {
      $this->matchesSafelyWithDiagnosticDescription($item, $mismatchDescription);
    }
  }
  
  // -- Protected Methods
  
  /**
   * Subclasses should implement these. The item will already have been checked for
   * the specific type.
   */
  abstract protected function matchesSafelyWithDiagnosticDescription($item,
    Hamcrest_Description $mismatchDescription);
  
  // -- Private Methods
  
  private function _isSafeType($value)
  {
    switch ($this->_expectedType)
    {
      
      case self::TYPE_STRING:
        return is_string($value) || is_numeric($value);
      
      case self::TYPE_NUMERIC:
        return is_numeric($value) || is_string($value);
      
      case self::TYPE_ARRAY:
        return is_array($value);
      
      case self::TYPE_OBJECT:
        return is_object($value);
      
      case self::TYPE_RESOURCE:
        return is_resource($value);
      
      case self::TYPE_BOOLEAN:
        return true;
      
    }
  }
  
}

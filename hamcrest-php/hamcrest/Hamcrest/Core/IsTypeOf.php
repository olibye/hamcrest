<?php

/*
 Copyright (c) 2010 hamcrest.org
 */

require_once 'Hamcrest/BaseMatcher.php';
require_once 'Hamcrest/Description.php';

/**
 * Tests whether the value has a built-in type.
 */
class Hamcrest_Core_IsTypeOf extends Hamcrest_BaseMatcher
{
  
  private $_theType;
  
  /**
   * Creates a new instance of IsTypeOf
   *
   * @param string $theType
   *   The predicate evaluates to true for values with this built-in type.
   */
  public function __construct($theType)
  {
    $this->_theType = strtolower($theType);
  }
  
  public function matches($item)
  {
    return strtolower(gettype($item)) == $this->_theType;
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText($this->getTypeDescription($this->_theType));
  }

  public function describeMismatch($item, Hamcrest_Description $description)
  {
    $description->appendText('was ')
                ->appendText($this->getTypeDescription(
                              strtolower(gettype($item))))
                ;
  }

  protected function getTypeDescription($type)
  {
    if ($type == 'null')
    {
      return $type;
    }
    return (strpos('aeiou', substr($type, 0, 1)) === false ? 'a ' : 'an ')
        . $type;
  }
  
  /**
   * Is the value a particular built-in type?
   */
  public static function typeOf($theType)
  {
    return new self($theType);
  }
  
}

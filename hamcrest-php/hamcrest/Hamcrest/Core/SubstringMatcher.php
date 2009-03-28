<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/BaseMatcher.php';
require_once 'Hamcrest/Description.php';

abstract class Hamcrest_Core_SubstringMatcher extends Hamcrest_BaseMatcher
{
  
  protected $_substring;
  
  public function __construct($substring)
  {
    $this->_substring = $substring;
  }
  
  public function matches($item)
  {
    return $this->evalSubstringOf($item);
  }
  
  public function describeMismatch($item,
    Hamcrest_Description $mismatchDescription)
  {
    $mismatchDescription->appendText('was ')->appendValue($item);
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText('a string ')
                ->appendText($this->relationship())
                ->appendText(' ')
                ->appendValue($this->_substring)
                ;
  }
  
  abstract protected function evalSubstringOf($string);
  
  abstract protected function relationship();
  
}

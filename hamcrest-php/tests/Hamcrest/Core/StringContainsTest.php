<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Core/StringContains.php';

class Hamcrest_Core_StringContainsTest extends Hamcrest_AbstractMatcherTest
{
  
  const EXCERPT = 'EXCERPT';
  
  private $_stringContains;
  
  public function setUp()
  {
    $this->_stringContains = Hamcrest_Core_StringContains::containsString(self::EXCERPT);
  }
  
  protected function createMatcher()
  {
    return $this->_stringContains;
  }
  
  public function testEvaluatesToTrueIfArgumentContainsSpecifiedSubstring()
  {
    $this->assertTrue($this->_stringContains->matches(self::EXCERPT . 'END'),
      'should be true if excerpt at beginning'
    );
    $this->assertTrue($this->_stringContains->matches('START' . self::EXCERPT),
      'should be true if excerpt at end'
    );
    $this->assertTrue($this->_stringContains->matches('START' . self::EXCERPT . 'END'),
      'should be true if excerpt in middle'
    );
    $this->assertTrue($this->_stringContains->matches(self::EXCERPT . self::EXCERPT),
      'should be true if excerpt is repeated'
    );
    
    $this->assertFalse($this->_stringContains->matches('Something else'),
      'should not be true if excerpt is not in string'
    );
    $this->assertFalse($this->_stringContains->matches(substr(self::EXCERPT, 1)),
      'should not be true if part of excerpt is in string'
    );
  }
  
  public function testEvaluatesToTrueIfArgumentIsEqualToSubstring()
  {
    $this->assertTrue($this->_stringContains->matches(self::EXCERPT),
      'should be true if excerpt is entire string'
    );
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('a string containing "EXCERPT"', $this->_stringContains);
  }
  
}

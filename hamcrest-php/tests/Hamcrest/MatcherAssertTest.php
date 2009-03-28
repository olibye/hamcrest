<?php

require_once realpath(dirname(__FILE__)) . '/../includes.php';

require_once 'hamcrest.php';
require_once 'Hamcrest/MatcherAssert.php';
require_once 'Hamcrest/AssertionError.php';

class Hamcrest_MatcherAssertTest extends PHPUnit_Framework_TestCase
{
  
  public function testIncludesDescriptionOfTestedValueInErrorMessage()
  {
    $expected = 'expected';
    $actual = 'actual';
    
    $expectedMessage = 
      'identifier' . PHP_EOL .
      'Expected: "expected"' . PHP_EOL .
      '     but: was "actual"';
    
    try
    {
      assertThat('identifier', $actual, equalTo($expected));
    }
    catch (Hamcrest_AssertionError $ex)
    {
      $this->assertEquals($expectedMessage, $ex->getMessage());
      return;
    }
    
    $this->fail("should have failed");
  }
  
}

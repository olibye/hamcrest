<?php
require_once 'Hamcrest/StringDescription.php';
require_once 'Hamcrest/SelfDescribing.php';
require_once 'Hamcrest/Description.php';

class Hamcrest_SampleSelfDescriber implements Hamcrest_SelfDescribing
{
  private $_text;
  
  public function __construct($text)
  {
    $this->_text = $text;
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText($this->_text);
  }
}

class Hamcrest_StringDescriptionTest extends PHPUnit_Framework_TestCase
{
  
  private $_description;
  
  public function setUp()
  {
    $this->_description = new Hamcrest_StringDescription();
  }
  
  public function testAppendTextAppendsTextInformation()
  {
    $this->_description->appendText('foo')->appendText('bar');
    $this->assertEquals('foobar', (string) $this->_description);
  }
  
  public function testAppendValueCanAppendTextTypes()
  {
    $this->_description->appendValue('foo');
    $this->assertEquals('"foo"', (string) $this->_description);
  }
  
  public function testSpecialCharactersAreEscapedForStringTypes()
  {
    $this->_description->appendValue("foo\\bar\"zip\r\n");
    $this->assertEquals('"foo\\bar\\"zip\r\n"', (string) $this->_description);
  }
  
  public function testIntegerValuesCanBeAppended()
  {
    $this->_description->appendValue(42);
    $this->assertEquals('<42>', (string) $this->_description);
  }
  
  public function testFloatValuesCanBeAppended()
  {
    $this->_description->appendValue(42.78);
    $this->assertEquals('<42.78F>', (string) $this->_description);
  }
  
  public function testNullValuesCanBeAppended()
  {
    $this->_description->appendValue(null);
    $this->assertEquals('null', (string) $this->_description);
  }
  
  public function testArraysCanBeAppended()
  {
    $this->_description->appendValue(array('foo', 42.78));
    $this->assertEquals('["foo", <42.78F>]', (string) $this->_description);
  }
  
  public function testObjectsCanBeAppended()
  {
    $this->_description->appendValue(new stdClass());
    $this->assertEquals('<stdClass>', (string) $this->_description);
  }
  
  public function testBooleanValuesCanBeAppended()
  {
    $this->_description->appendValue(false);
    $this->assertEquals('<false>', (string) $this->_description);
  }
  
  public function testListsOfvaluesCanBeAppended()
  {
    $this->_description->appendValueList('@start@', '@sep@ ', '@end@', array('foo', 42.78));
    $this->assertEquals('@start@"foo"@sep@ <42.78F>@end@', (string) $this->_description);
  }
  
  public function testSelfDescribingObjectsCanBeAppended()
  {
    $this->_description
      ->appendDescriptionOf(new Hamcrest_SampleSelfDescriber('foo'))
      ->appendDescriptionOf(new Hamcrest_SampleSelfDescriber('bar'))
      ;
    $this->assertEquals('foobar', (string) $this->_description);
  }
  
  public function testSelfDescribingObjectsCanBeAppendedAsLists()
  {
    $this->_description->appendList('@start@', '@sep@ ', '@end@', array(
      new Hamcrest_SampleSelfDescriber('foo'),
      new Hamcrest_SampleSelfDescriber('bar')
    ));
    $this->assertEquals('@start@foo@sep@ bar@end@', (string) $this->_description);
  }
  
}

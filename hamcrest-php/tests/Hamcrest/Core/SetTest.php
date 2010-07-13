<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Core/Set.php';

class Hamcrest_Core_SetTest extends Hamcrest_AbstractMatcherTest
{

  public static $_classProperty;
  public $_instanceProperty;

  protected function setUp()
  {
    self::$_classProperty = null;
    unset($this->_instanceProperty);
  }
  
  protected function createMatcher()
  {
    return Hamcrest_Core_Set::set('property_name');
  }

  public function testEvaluatesToTrueIfArrayPropertyIsSet()
  {
    assertThat(array('foo' => 'bar'), set('foo'));
  }

  public function testEvaluatesToTrueIfClassPropertyIsSet()
  {
    self::$_classProperty = 'foo';
    assertThat('Hamcrest_Core_SetTest', set('_classProperty'));
  }

  public function testEvaluatesToTrueIfObjectPropertyIsSet()
  {
    $this->_instanceProperty = 'foo';
    assertThat($this, set('_instanceProperty'));
  }

  public function testEvaluatesToFalseIfArrayPropertyIsNotSet()
  {
    assertThat(array('foo' => 'bar'), not(set('baz')));
    assertThat(array('foo' => 'bar'), notSet('baz'));
  }

  public function testEvaluatesToFalseIfClassPropertyIsNotSet()
  {
    assertThat('Hamcrest_Core_SetTest', not(set('_classProperty')));
    assertThat('Hamcrest_Core_SetTest', notSet('_classProperty'));
  }

  public function testEvaluatesToFalseIfObjectPropertyIsNotSet()
  {
    assertThat($this, not(set('_instanceProperty')));
    assertThat($this, notSet('_instanceProperty'));
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('set property foo', set('foo'));
    $this->assertDescription('unset property bar', notSet('bar'));
  }
  
  public function testDecribesPropertySettingInMismatchMessage()
  {
    $this->assertMismatchDescription('was not set', set('bar'),
        array('foo' => 'bar')
    );
    $this->assertMismatchDescription('was "bar"', notSet('foo'),
        array('foo' => 'bar')
    );
  }
  
}

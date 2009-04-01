<?php

require_once realpath(dirname(__FILE__)) . '/../includes.php';

require_once 'Hamcrest/StringDescriptionTest.php';
require_once 'Hamcrest/BaseMatcherTest.php';
require_once 'Hamcrest/FeatureMatcherTest.php';
require_once 'Hamcrest/MatcherAssertTest.php';
require_once 'Hamcrest/Core/AllOfTest.php';
require_once 'Hamcrest/Core/AnyOfTest.php';
require_once 'Hamcrest/Core/CombinableMatcherTest.php';
require_once 'Hamcrest/Core/DescribedAsTest.php';
require_once 'Hamcrest/Core/EveryTest.php';
require_once 'Hamcrest/Core/IsTest.php';
require_once 'Hamcrest/Core/IsNotTest.php';
require_once 'Hamcrest/Core/IsAnythingTest.php';
require_once 'Hamcrest/Core/IsCollectionContainingTest.php';
require_once 'Hamcrest/Core/IsEqualTest.php';
require_once 'Hamcrest/Core/IsInstanceOfTest.php';
require_once 'Hamcrest/Core/IsNullTest.php';
require_once 'Hamcrest/Core/IsSameTest.php';
require_once 'Hamcrest/Core/IsIdenticalTest.php';
require_once 'Hamcrest/Core/StringContainsTest.php';
require_once 'Hamcrest/Core/StringEndsWithTest.php';
require_once 'Hamcrest/Core/StringStartsWithTest.php';
require_once 'Hamcrest/Number/IsCloseToTest.php';
require_once 'Hamcrest/Number/OrderingComparisonTest.php';
require_once 'Hamcrest/Text/IsEmptyStringTest.php';
require_once 'Hamcrest/Text/IsEqualIgnoringCaseTest.php';
require_once 'Hamcrest/Text/IsEqualIgnoringWhiteSpaceTest.php';
require_once 'Hamcrest/Text/StringContainsInOrderTest.php';
require_once 'Hamcrest/Array/IsArrayTest.php';
require_once 'Hamcrest/Array/IsArrayContainingTest.php';
require_once 'Hamcrest/Array/IsArrayContainingInAnyOrderTest.php';

class Hamcrest_AllTests
{
  
  public static function suite()
  {
    $suite = new PHPUnit_Framework_TestSuite('Hamcrest');
    
    //TODO: Refactor into suites for Core, Number, Text...
    $suite->addTestSuite('Hamcrest_StringDescriptionTest');
    $suite->addTestSuite('Hamcrest_BaseMatcherTest');
    $suite->addTestSuite('Hamcrest_FeatureMatcherTest');
    $suite->addTestSuite('Hamcrest_MatcherAssertTest');
    $suite->addTestSuite('Hamcrest_Core_AllOfTest');
    $suite->addTestSuite('Hamcrest_Core_AnyOfTest');
    $suite->addTestSuite('Hamcrest_Core_CombinableMatcherTest');
    $suite->addTestSuite('Hamcrest_Core_DescribedAsTest');
    $suite->addTestSuite('Hamcrest_Core_EveryTest');
    $suite->addTestSuite('Hamcrest_Core_IsTest');
    $suite->addTestSuite('Hamcrest_Core_IsNotTest');
    $suite->addTestSuite('Hamcrest_Core_IsAnythingTest');
    $suite->addTestSuite('Hamcrest_Core_IsCollectionContainingTest');
    $suite->addTestSuite('Hamcrest_Core_IsEqualTest');
    $suite->addTestSuite('Hamcrest_Core_IsInstanceOfTest');
    $suite->addTestSuite('Hamcrest_Core_IsNullTest');
    $suite->addTestSuite('Hamcrest_Core_IsSameTest');
    $suite->addTestSuite('Hamcrest_Core_IsIdenticalTest');
    $suite->addTestSuite('Hamcrest_Core_StringContainsTest');
    $suite->addTestSuite('Hamcrest_Core_StringEndsWithTest');
    $suite->addTestSuite('Hamcrest_Core_StringStartsWithTest');
    $suite->addTestSuite('Hamcrest_Number_IsCloseToTest');
    $suite->addTestSuite('Hamcrest_Number_OrderingComparisonTest');
    $suite->addTestSuite('Hamcrest_Text_IsEmptyStringTest');
    $suite->addTestSuite('Hamcrest_Text_IsEqualIgnoringCaseTest');
    $suite->addTestSuite('Hamcrest_Text_IsEqualIgnoringWhiteSpaceTest');
    $suite->addTestSuite('Hamcrest_Text_StringContainsInOrderTest');
    $suite->addTestSuite('Hamcrest_Array_IsArrayTest');
    $suite->addTestSuite('Hamcrest_Array_IsArrayContainingTest');
    $suite->addTestSuite('Hamcrest_Array_IsArrayContainingInAnyOrderTest');
    
    return $suite;
  }
  
}

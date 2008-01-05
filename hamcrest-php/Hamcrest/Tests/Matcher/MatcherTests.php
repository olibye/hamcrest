<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';

require_once 'Hamcrest.php';

require_once 'Decorator/DecoratorTests.php';
require_once 'Logical/LogicalTests.php';
require_once 'Number/NumberTests.php';

require_once 'IsAnythingTest.php';
require_once 'IsEqualTest.php';
require_once 'IsInstanceOfTest.php';
require_once 'IsNullTest.php';
require_once 'IsSameTest.php';

class MatcherTests
{
    public static function suite()
    {
        $suite = new ::PHPUnit_Framework_TestSuite('Matcher');

        $suite->addTest(Hamcrest::DecoratorTests::suite());
        $suite->addTest(Hamcrest::LogicalTests::suite());
        $suite->addTest(Hamcrest::NumberTests::suite());

        $suite->addTestSuite('Hamcrest::IsAnythingTest');
        $suite->addTestSuite('Hamcrest::IsEqualTest');
        $suite->addTestSuite('Hamcrest::IsInstanceOfTest');
        $suite->addTestSuite('Hamcrest::IsNullTest');
        $suite->addTestSuite('Hamcrest::IsSameTest');

        return $suite;
    }
}

<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';

require_once 'Hamcrest.php';

require_once 'AbstractMatcherTest.php';
require_once 'BaseMatcherTest.php';
require_once 'MatcherAssertTest.php';

require_once 'Matcher/MatcherTests.php';

class AllTests
{
    public static function suite()
    {
        $suite = new ::PHPUnit_Framework_TestSuite('Hamcrest');

        $suite->addTest(Hamcrest::MatcherTests::suite());

        $suite->addTestSuite('Hamcrest::BaseMatcherTest');
        $suite->addTestSuite('Hamcrest::MatcherAssertTest');

        return $suite;
    }
}

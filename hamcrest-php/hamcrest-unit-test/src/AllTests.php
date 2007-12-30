<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

require_once 'Hamcrest.php';

require_once 'AbstractMatcherTest.php';
require_once 'BaseMatcherTest.php';
require_once 'MatcherAssertTest.php';
require_once 'TypeSafeMatcherTest.php';

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Hamcrest::AllTests::main');
}

class AllTests
{
    public static function main()
    {
        ::PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new ::PHPUnit_Framework_TestSuite('Hamcrest');

        $suite->addTestSuite('Hamcrest::BaseMatcherTest');
        $suite->addTestSuite('Hamcrest::MatcherAssertTest');
        $suite->addTestSuite('Hamcrest::TypeSafeMatcherTest');

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'Hamcrest::AllTests::main') {
    AllTests::main();
}

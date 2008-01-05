<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';

require_once 'Hamcrest.php';

require_once 'AllOfTest.php';
require_once 'AnyOfTest.php';
require_once 'IsNotTest.php';

class LogicalTests
{
    public static function suite()
    {
        $suite = new ::PHPUnit_Framework_TestSuite('Logical');

        $suite->addTestSuite('Hamcrest::AllOfTest');
        $suite->addTestSuite('Hamcrest::AnyOfTest');
        $suite->addTestSuite('Hamcrest::IsNotTest');

        return $suite;
    }
}

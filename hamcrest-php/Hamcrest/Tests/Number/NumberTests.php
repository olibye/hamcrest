<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';

require_once 'Hamcrest.php';

require_once 'Number/IsCloseToTest.php';
require_once 'Number/OrderingComparisonTest.php';

class NumberTests
{
    public static function suite()
    {
        $suite = new ::PHPUnit_Framework_TestSuite('Numbers');

        $suite->addTestSuite('Hamcrest::IsCloseToTest');
        $suite->addTestSuite('Hamcrest::OrderingComparisonTest');

        return $suite;
    }
}

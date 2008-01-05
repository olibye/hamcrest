<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';

require_once 'Hamcrest.php';

require_once 'DescribedAsTest.php';
require_once 'IsTest.php';

class DecoratorTests
{
    public static function suite()
    {
        $suite = new ::PHPUnit_Framework_TestSuite('Decorator');

        $suite->addTestSuite('Hamcrest::DescribedAsTest');
        $suite->addTestSuite('Hamcrest::IsTest');

        return $suite;
    }
}

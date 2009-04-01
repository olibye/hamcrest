<?php

error_reporting(E_ALL | E_STRICT);

if (defined('E_DEPRECATED'))
{
  error_reporting(error_reporting() | E_DEPRECATED);
}

define('HAMCREST_TEST_BASE', realpath(dirname(__FILE__)));

require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/Framework/TestCase.php';
require_once 'PHPUnit/Framework/TestSuite.php';

set_include_path(
  get_include_path() . PATH_SEPARATOR .
  HAMCREST_TEST_BASE . PATH_SEPARATOR .
  realpath(HAMCREST_TEST_BASE . '/..') . PATH_SEPARATOR .
  realpath(HAMCREST_TEST_BASE . '/../hamcrest')
);

require_once HAMCREST_TEST_BASE . '/../hamcrest.php';

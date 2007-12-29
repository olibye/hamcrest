<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';
require_once 'Hamcrest.php';

class SomeMatcher extends BaseMatcher {
    public function matches($item) {
        throw new RuntimeException;
    }

    public function describeTo(Description $description) {
        $description->appendText('SOME DESCRIPTION');
    }
}

class BaseMatcherTest extends ::PHPUnit_Framework_TestCase {
    public function testDescribesItselfWithToStringMethod() {
        $someMatcher = new SomeMatcher;
        $this->assertEquals('SOME DESCRIPTION', (string)$someMatcher);
    }
}

<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';
require_once 'Hamcrest.php';

class UnknownType {
}

abstract class AbstractMatcherTest extends ::PHPUnit_Framework_TestCase {
    /**
     * Create an instance of the Matcher so some generic safety-net tests can be run on it.
     */
    protected abstract function createMatcher();

    public function assertMatches($message, Matcher $c, $arg) {
        $this->assertTrue($message, $c->matches($arg));
    }

    public function assertDoesNotMatch($message, Matcher $c, $arg) {
        $this->assertFalse($message, $c->matches($arg));
    }

    public function assertDescription($expected, Matcher $matcher) {
        $description = new StringDescription;
        $description->appendDescriptionOf($matcher);
        $this->assertEquals('Expected description', $expected, (string)$description);
    }

    public function testIsNullSafe() {
       // should not throw a NullPointerException
       $this->createMatcher()->matches(null);
    }

    public function testCopesWithUnknownTypes() {
        // should not throw ClassCastException
        $this->createMatcher()->matches(new UnknownType);
    }
}

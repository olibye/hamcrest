<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';
require_once 'Hamcrest.php';

class IsTest extends AbstractMatcherTest {
    protected function createMatcher() {
        return is('something');
    }

    public function testJustMatchesTheSameWayTheUnderylingMatcherDoes() {
        $this->assertMatches('should match', is(equalTo(true)), true);
        $this->assertMatches('should match', is(equalTo(false)), false);
        $this->assertDoesNotMatch('should not match', is(equalTo(true)), false);
        $this->assertDoesNotMatch('should not match', is(equalTo(false)), true);
    }

    public function testGeneratesIsPrefixInDescription() {
        $this->assertDescription('is <true>', is(equalTo(true)));
    }

    public function testProvidesConvenientShortcutForIsEqualTo() {
        $this->assertMatches('should match', is('A'), 'A');
        $this->assertMatches('should match', is('B'), 'B');
        $this->assertDoesNotMatch('should not match', is('A'), 'B');
        $this->assertDoesNotMatch('should not match', is('B'), 'A');
        $this->assertDescription('is \'A\'', is('A'));
    }

    public function testProvidesConvenientShortcutForIsInstanceOf() {
        $this->markTestIncomplete();
    }
}

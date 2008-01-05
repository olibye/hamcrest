<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';
require_once 'Hamcrest.php';

class IsNotTest extends AbstractMatcherTest {
    protected function createMatcher() {
        return not('something');
    }

    public function testEvaluatesToTheTheLogicalNegationOfAnotherMatcher() {
        $this->assertMatches('should match', not(equalTo('A')), 'B');
        $this->assertDoesNotMatch('should not match', not(equalTo('B')), 'B');
    }

    public function testProvidesConvenientShortcutForNotEqualTo() {
        $this->assertMatches('should match', not('A'), 'B');
        $this->assertMatches('should match', not('B'), 'A');
        $this->assertDoesNotMatch('should not match', not('A'), 'A');
        $this->assertDoesNotMatch('should not match', not('B'), 'B');
        $this->assertDescription('not \'A\'', not('A'));
    }
}

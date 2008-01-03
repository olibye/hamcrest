<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';
require_once 'Hamcrest.php';

class IsCloseToTest extends AbstractMatcherTest {
    protected function createMatcher() {
        return closeTo(0.1, 0.1);
    }

    public function testEvaluatesToTrueIfArgumentIsEqualToADoubleValueWithinSomeError() {
        $p = closeTo(1.0, 0.5);

        $this->assertTrue($p->matches(1.0));
        $this->assertTrue($p->matches(0.5));
        $this->assertTrue($p->matches(1.5));
        $this->assertFalse($p->matches(2.0));
        $this->assertFalse($p->matches(0.0));
    }
}

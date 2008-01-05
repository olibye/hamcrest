<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';
require_once 'Hamcrest.php';

class OrderingComparisonTest extends AbstractMatcherTest {
    protected function createMatcher() {
        return greaterThan(1);
    }

    public function testComparesObjectsForGreaterThan() {
        $p = greaterThan(1);
        $this->assertTrue($p->matches(2));

        $p = not(greaterThan(1));
        $this->assertTrue($p->matches(0));
    }

    public function testComparesObjectsForLessThan() {
        $p = lessThan(3);
        $this->assertTrue($p->matches(2));

        $p = lessThan(1);
        $this->assertTrue($p->matches(0));
    }

    public function testAllowsForInclusiveComparisons() {
        $p = lessThanOrEqualTo(1);
        $this->assertTrue($p->matches(1));

        $p = greaterThanOrEqualTo(1);
        $this->assertTrue($p->matches(1));
    }

    public function testSupportsDifferentTypesOfComparableObjects() {
        $p = greaterThan(1.0);
        $this->assertTrue($p->matches(1.1));

        $p = greaterThan('bb');
        $this->assertTrue($p->matches('cc'));
    }
}

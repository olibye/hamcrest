<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';
require_once 'Hamcrest.php';

class IsSameTest extends AbstractMatcherTest {
    protected function createMatcher() {
        return sameInstance('irrelevant');
    }

    public function testEvaluatesToTrueIfArgumentIsReferenceToASpecifiedObject() {
        $o1 = new StdClass;
        $o2 = new StdClass;

        assertThat($o1, sameInstance($o1));
        assertThat($o2, not(sameInstance($o1)));
    }

    public function testReturnsReadableDescriptionFromToString() {
        $this->assertDescription('same(\'ARG\')', sameInstance('ARG'));
    }

    public function testReturnsReadableDescriptionFromToStringWhenInitialisedWithNull() {
        $this->assertDescription('same(null)', sameInstance(null));
    }
}

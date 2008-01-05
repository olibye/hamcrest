<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';
require_once 'Hamcrest.php';

class IsEqualTest extends AbstractMatcherTest {
    protected function createMatcher() {
        return equalTo('irrelevant');
    }

    public function testComparesObjectsUsingEqualsMethod() {
        assertThat('hi', equalTo('hi'));
        assertThat('bye', not(equalTo('hi')));

        assertThat(1, equalTo(1));
        assertThat(1, not(equalTo(2)));
    }

    public function testCanCompareNullValues() {
        assertThat(null, equalTo(null));

        assertThat(null, not(equalTo('hi')));
        assertThat('hi', not(equalTo(null)));
    }

    public function testHonoursIsEqualImplementationEvenWithNullValues() {
        $this->markTestIncomplete();
    }
    
    public function testComparesTheElementsOfAnObjectArray() {
        $s1 = array('a', 'b');
        $s2 = array('a', 'b');
        $s3 = array('c', 'd');
        $s4 = array('a', 'b', 'c', 'd');

        assertThat($s1, equalTo($s1));
        assertThat($s2, equalTo($s1));
        assertThat($s3, not(equalTo($s1)));
        assertThat($s4, not(equalTo($s1)));
    }

    public function testComparesTheElementsOfAnArrayOfPrimitiveTypes() {
        $i1 = array(1, 2);
        $i2 = array(1, 2);
        $i3 = array(3, 4);
        $i4 = array(1, 2, 3, 4);

        assertThat($i1, equalTo($i1));
        assertThat($i2, equalTo($i1));
        assertThat($i3, not(equalTo($i1)));
        assertThat($i4, not(equalTo($i1)));
    }

    public function testRecursivelyTestsElementsOfArrays() {
        $i1 = array(array(1, 2), array(3, 4));
        $i2 = array(array(1, 2), array(3, 4));
        $i3 = array(array(5, 6), array(7, 8));
        $i4 = array(array(1, 2, 3, 4), array(3, 4));

        assertThat($i1, equalTo($i1));
        assertThat($i2, equalTo($i1));
        assertThat($i3, not(equalTo($i1)));
        assertThat($i4, not(equalTo($i1)));
    }

    public function testIncludesTheResultOfCallingToStringOnItsArgumentInTheDescription() {
        $this->markTestIncomplete();
    }

    public function testReturnsAnObviousDescriptionIfCreatedWithANestedMatcherByMistake() {
        $innerMatcher = equalTo('NestedMatcher');
        $this->assertDescription('<' . (string)$innerMatcher . '>', equalTo($innerMatcher));
    }

    public function testReturnsGoodDescriptionIfCreatedWithNullReference() {
        $this->assertDescription('null', equalTo(null));
    }
}

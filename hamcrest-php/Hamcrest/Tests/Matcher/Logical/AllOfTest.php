<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';
require_once 'Hamcrest.php';

class AllOfTest extends AbstractMatcherTest {
    protected function createMatcher() {
        return allOf(equalTo('irrelevant'), equalTo('irrelevant'));
    }

    public function testEvaluatesToTheTheLogicalConjunctionOfTwoOtherMatchers() {
        assertThat('good', allOf(equalTo('good'), equalTo('good')));

        assertThat('good', not(allOf(equalTo('bad'), equalTo('good'))));
        assertThat('good', not(allOf(equalTo('good'), equalTo('bad'))));
        assertThat('good', not(allOf(equalTo('bad'), equalTo('bad'))));
    }

    public function testEvaluatesToTheTheLogicalConjunctionOfManyOtherMatchers() {
        assertThat('good', allOf(equalTo('good'), equalTo('good'), equalTo('good'), equalTo('good'), equalTo('good')));
        assertThat('good', not(allOf(equalTo('good'), equalTo('good'), equalTo('bad'), equalTo('good'), equalTo('good'))));
    }
    
    public function testSupportsMixedTypes() {
        $this->markTestIncomplete();
    }
}

<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';
require_once 'Hamcrest.php';

class AnyOfTest extends AbstractMatcherTest {
    protected function createMatcher() {
        return anyOf(equalTo('irrelevant'));
    }

    public function testEvaluatesToTheTheLogicalDisjunctionOfTwoOtherMatchers() {
        assertThat('good', anyOf(equalTo('bad'), equalTo('good')));
        assertThat('good', anyOf(equalTo('good'), equalTo('good')));
        assertThat('good', anyOf(equalTo('good'), equalTo('bad')));

        assertThat('good', not(anyOf(equalTo('bad'), equalTo('bad'))));
    }

    public function testEvaluatesToTheTheLogicalDisjunctionOfManyOtherMatchers() {
        assertThat('good', anyOf(equalTo('bad'), equalTo('good'), equalTo('bad'), equalTo('bad'), equalTo('bad')));
        assertThat('good', not(anyOf(equalTo('bad'), equalTo('bad'), equalTo('bad'), equalTo('bad'), equalTo('bad'))));
    }

    public function testSupportsMixedTypes() {
        $this->markTestIncomplete();
    }    
}

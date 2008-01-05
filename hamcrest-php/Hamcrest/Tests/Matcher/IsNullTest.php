<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';
require_once 'Hamcrest.php';

class IsNullTest extends AbstractMatcherTest {
    protected function createMatcher() {
        return nullValue();
    }

    public function testEvaluatesToTrueIfArgumentIsNull() {
        assertThat(null, nullValue());
        assertThat(new StdClass, not(nullValue()));

        assertThat(new StdClass, notNullValue());
        assertThat(null, not(notNullValue()));
    }
}

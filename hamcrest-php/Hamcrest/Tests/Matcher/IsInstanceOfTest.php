<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';
require_once 'Hamcrest.php';

class IsInstanceOfTest extends AbstractMatcherTest {
    protected function createMatcher() {
        return anInstanceOf('StdClass');
    }

    public function testEvaluatesToTrueIfArgumentIsInstanceOfASpecificClass() {
        assertThat(new StdClass, anInstanceOf('StdClass'));
        assertThat(null, not(anInstanceOf('StdClass')));
    }
}

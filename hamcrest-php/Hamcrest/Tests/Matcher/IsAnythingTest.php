<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';
require_once 'Hamcrest.php';

class IsAnythingTest extends AbstractMatcherTest {
    protected function createMatcher() {
        return anything();
    }

    public function testAlwaysEvaluatesToTrue() {
        assertThat(null, anything());
        assertThat(new StdClass, anything());
        assertThat('hi', anything());
    }

    public function testHasUsefulDefaultDescription() {
        $this->assertDescription('ANYTHING', anything());
    }

    public function testCanOverrideDescription() {
        $this->assertDescription('description', anything('description'));
    }
}

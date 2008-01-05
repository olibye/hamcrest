<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

require_once 'PHPUnit/Framework.php';
require_once 'Hamcrest.php';

class MatcherAssertTest extends ::PHPUnit_Framework_TestCase {
    public function testIncludesDescriptionOfTestedValueInErrorMessage() {
        $expected = 'expected';
        $actual = 'actual';
        
        $expectedMessage = "identifier\nExpected: \"expected\"\n     got: \"actual\"\n";
        
        try {
            assertThat('identifier', $actual, equalTo($expected));
        }

        catch (AssertionError $e) {
            $this->assertEquals($expectedMessage, $e->getMessage());
            return;
        }
        
        $this->fail('should have failed');
    }

    public function testDescriptionCanBeElided() {
        $expected = 'expected';
        $actual = 'actual';
        
        $expectedMessage = "\nExpected: \"expected\"\n     got: \"actual\"\n";
        
        try {
            assertThat($actual, equalTo($expected));
        }

        catch (AssertionError $e) {
            $this->assertEquals($expectedMessage, $e->getMessage());
            return;
        }
        
        $this->fail('should have failed');
    }
    
    public function testCanTestBooleanDirectly() {
        assertThat('success reason message', true);
        
        try {
            assertThat('failing reason message', false);
        }

        catch (AssertionError $e) {
            $this->assertEquals('failing reason message', $e->getMessage());
            return;
        }
        
        fail('should have failed');
    }
}

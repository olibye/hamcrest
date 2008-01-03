<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

/**
 * Tests if the argument is a string that contains a substring.
 */
class StringContains extends SubstringMatcher {
    protected function evalSubstringOf($s) {
        return strpos($s, $this->substring) !== FALSE;
    }

    protected function relationship() {
        return 'containing';
    }
}

function containsString($substring) {
    return new StringContains($substring);
}

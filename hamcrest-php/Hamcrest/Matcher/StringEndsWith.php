<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

/**
 * Tests if the argument is a string that contains a substring.
 */
class StringEndsWith extends SubstringMatcher {
    protected function evalSubstringOf($s) {
            return substr($s, 0 - strlen($this->substring)) === $this->substring;
    }

    protected function relationship() {
        return 'ending with';
    }
}

function endsWith($substring) {
    return new StringEndsWith($substring);
}

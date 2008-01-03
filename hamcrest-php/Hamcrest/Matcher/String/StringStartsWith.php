<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

/**
 * Tests if the argument is a string that contains a substring.
 */
class StringStartsWith extends SubstringMatcher {
    protected function evalSubstringOf($s) {
        return strpos($s, $this->substring) === 0;
    }

    protected function relationship() {
        return 'starting with';
    }
}

function startsWith($substring) {
    return new StringStartsWith($substring);
}

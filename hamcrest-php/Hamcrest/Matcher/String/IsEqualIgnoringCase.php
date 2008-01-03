<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

/**
 * Tests if a string is equal to another string, regardless of the case.
 */
class IsEqualIgnoringCase extends BaseMatcher {
    protected $string;

    public function __construct($string) {
        if (!is_string($string)) {
            throw new IllegalArgumentException;
        }

        $this->string = $string;
    }

    public function matches($item) {
        return strtolower($this->string) === strtolower($item);
    }

    public function describeTo(Description $description) {
        $description->appendText('eqIgnoringCase(')
                    ->appendValue($this->string)
                    ->appendText(')');
    }
}

function equalToIgnoringCase($string) {
    return new IsEqualIgnoringCase($string);
}

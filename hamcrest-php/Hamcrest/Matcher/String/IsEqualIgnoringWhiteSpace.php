<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

/**
 * Tests if a string is equal to another string, regardless of the case.
 */
class IsEqualIgnoringWhiteSpace extends BaseMatcher {
    protected $string;

    public function __construct($string) {
        if (!is_string($string)) {
            throw new IllegalArgumentException;
        }

        $this->string = $string;
    }

    public function matches($item) {
        return preg_replace('/\s+/', '', $this->string) === preg_replace('/\s+/', '', $item);
    }

    public function describeTo(Description $description) {
        $description->appendText('eqIgnoringWhiteSpace(')
                    ->appendValue($this->string)
                    ->appendText(')');
    }
}

function equalToIgnoringWhiteSpace($string) {
    return new IsEqualIgnoringWhiteSpace($string);
}

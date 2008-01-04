<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

/**
 * Is the value null?
 */
class IsNull extends BaseMatcher {
    public function matches($o) {
        return $o === null;
    }

    public function describeTo(Description $description) {
        $description->appendText('null');
    }

    /**
     * Matches if value is null.
     */
    public static function nullValue() {
        return new IsNull;
    }
}

/**
 * Matches if value is null.
 */
function nullValue() {
    return IsNull::nullValue();
}

/**
 * Matches if value is not null.
 */
function notNullValue() {
    return not(IsNull::nullValue());
}

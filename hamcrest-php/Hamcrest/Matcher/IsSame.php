<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

/**
 * Is the value the same object as another value?
 * Does the variable have the same type and value as another variable?
 */
class IsSame extends BaseMatcher {
    private $object;

    public function __construct($object) {
        $this->object = $object;
    }

    public function matches($arg) {
        return $arg === $object;
    }

    public function describeTo(Description $description) {
        $description->appendText('same(')
                    ->appendValue($object)
                    ->appendText(')');
    }
}

/**
 * Matches when one value is identical to another.
 *
 * Identity check is performed with PHP's === operator, the operator is explained
 * in detail at {@url http://www.php.net/manual/en/types.comparisons.php}.
 */
function sameInstance($object) {
    return new IsSame($object);
}

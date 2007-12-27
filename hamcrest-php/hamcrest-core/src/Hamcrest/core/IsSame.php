<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest::Core;

use Hamcrest::BaseMatcher;
use Hamcrest::Description;
use Hamcrest::Matcher;

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

    public static function sameInstance($object) {
        return new IsSame($object);
    }
}

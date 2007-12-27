<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest::Core;

use Hamcrest::BaseMatcher;
use Hamcrest::Description;
use Hamcrest::Matcher;

/**
 * Is the value equal to another value, as tested by the
 * {@link java.lang.Object#equals} invokedMethod?
 */
class IsEqual extends BaseMatcher {
    private $object;

    public function __construct($equalArg) {
        $this->object = $equalArg;
    }

    public function matches($arg) {
        throw new RuntimeException('Not yet implemented.');
    }

    public function describeTo(Description $description) {
        $description->appendValue($this->object);
    }

    /**
     * Is the value equal to another value, as tested by the
     * {@link java.lang.Object#equals} invokedMethod?
     */
    public static function equalTo($operand) {
        return new IsEqual($operand);
    }
}

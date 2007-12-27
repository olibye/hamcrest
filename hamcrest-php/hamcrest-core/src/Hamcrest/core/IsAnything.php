<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest::Core;

use Hamcrest::Description;
use Hamcrest::Matcher;
use Hamcrest::BaseMatcher;

/**
 * A matcher that always returns <code>true</code>.
 */
class IsAnything extends BaseMatcher {
    private $description;

    public function __construct($description = 'ANYTHING') {
        $this->description = $description;
    }

    public function matches($o) {
        return true;
    }

    public function describeTo(Description $description) {
        $description->appendText($this->description);
    }

    /**
     * This matcher always evaluates to true.
     *
     * @param description A meaningful string used when describing itself.
     */
    public static function anything($description = 'ANYTHING') {
        return new IsAnything($description);
    }
}

<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest::Core;

use Hamcrest::Description;
use Hamcrest::Matcher;

/**
 * Calculates the logical disjunction of two matchers. Evaluation is
 * shortcut, so that the second matcher is not called if the first
 * matcher returns <code>true</code>.
 */
class AnyOf extends ShortcutCombination {
    public function matches($o) {
        return $this->doMatches($o, true);
    }

    public function describeTo(Description $description) {
        $this->doDescribeTo($description, 'or');
    }

    /**
     * Evaluates to true if ANY of the passed in matchers evaluate to true.
     */
    public static function anyOf($matchers) {
        return new AnyOf($matchers);
    }
}

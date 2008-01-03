<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

/**
 * Calculates the logical conjunction of two matchers. Evaluation is
 * shortcut, so that the second matcher is not called if the first
 * matcher returns <code>false</code>.
 */
class AllOf extends ShortcutCombination {
    public function matches($o) {
        return $this->doMatches($o, false);
    }

    public function describeTo(Description $description) {
        $this->doDescribeTo($description, 'and');
    }
}

/**
 * Evaluates to true only if ALL of the passed in matchers evaluate to true.
 */
function allOf($matchers) {
    return new AllOf($matchers);
}

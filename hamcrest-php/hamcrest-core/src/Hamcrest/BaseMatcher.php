<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

/**
 * BaseClass for all Matcher implementations.
 *
 * @see Matcher
 */
abstract class BaseMatcher implements Matcher {
    /**
     * @see Matcher#_dont_implement_Matcher___instead_extend_BaseMatcher_()
     */
    public final function _dont_implement_Matcher___instead_extend_BaseMatcher_() {
        // See Matcher interface for an explanation of this method.
    }

    public function __toString() {
        return StringDescription::toString($this);
    }
}

<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

/**
 * Decorates another Matcher, retaining the behavior but allowing tests
 * to be slightly more expressive.
 *
 * eg. assertThat(cheese, equalTo(smelly))
 * vs  assertThat(cheese, is(equalTo(smelly)))
 */
class Is extends BaseMatcher {
    private $matcher;

    public function __construct(Matcher $matcher) {
        $this->matcher = $matcher;
    }

    public function matches($arg) {
        return $this->matcher->matches($arg);
    }

    public function describeTo(Description $description) {
        $description->appendText('is ')->appendDescriptionOf($this->matcher);
    }
}

/**
 * Decorates another Matcher, retaining the behavior but allowing tests
 * to be slightly more expressive.
 *
 * eg. assertThat(cheese, equalTo(smelly))
 * vs  assertThat(cheese, is(equalTo(smelly)))
 */
function is(Matcher $matcher) {
    return new Is($matcher);
}

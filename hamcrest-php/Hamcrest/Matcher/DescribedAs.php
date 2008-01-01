<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

/**
 * Provides a custom description to another matcher.
 */
class DescribedAs extends BaseMatcher {
    private $descriptionTemplate;
    private $matcher;
    private $values;

    public function __construct($descriptionTemplate, Matcher $matcher, array $values) {
        $this->descriptionTemplate = $descriptionTemplate;
        $this->matcher = $matcher;
        $this->values = $values;
    }

    public function matches($o) {
        return $this->matcher->matches($o);
    }

    public function describeTo(Description $description) {
        throw new RuntimeException('Not yet implemented.');
    }
}

/**
 * Wraps an existing matcher and overrides the description when it fails.
 */
function describedAs($description, Matcher $matcher, array $values) {
    return new DescribedAs($description, $matcher, $values);
}

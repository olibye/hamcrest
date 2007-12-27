<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

/**
 * A description of a Matcher. A Matcher will describe itself to a description
 * which can later be used for reporting.
 *
 * @see Matcher#describeTo(Description)
 */
interface Description {
    /**
     * Appends some plain text to the description.
     */
    public function appendText($text);

    /**
     * Appends the description of a {@link SelfDescribing} value to this description.
     */
    public function appendDescriptionOf(SelfDescribing $value);

    /**
     * Appends an arbitary value to the description.
     */
    public function appendValue($value);

    /**
     * Appends a list of objects or values to the description.
     */
    public function appendList($start, $separator, $end, $values);
}

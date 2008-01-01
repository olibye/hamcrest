<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

/**
 * Tests whether the value is an instance of a class.
 */
class IsInstanceOf extends BaseMatcher {
    private $theClass;

    /**
     * Creates a new instance of IsInstanceOf
     *
     * @param theClass The predicate evaluates to true for instances of this class
     *                 or one of its subclasses.
     */
    public function __construct($theClass) {
        $this->theClass = $theClass;
    }

    public function matches($item) {
        return $item instanceof $this->theClass;
    }

    public function describeTo(Description $description) {
        $description->appendText('an instance of ' . $this->theClass);
    }
}

/**
 * Is the value an instance of a particular type?
 */
function anInstanceOf($type) {
    return new IsInstanceOf($type);
}

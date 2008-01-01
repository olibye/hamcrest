<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

/**
 * Is the value equal to another value, as tested by the
 * {@link java.lang.Object#equals} invokedMethod?
 */
class IsCloseTo extends IsEqual {
    protected $error = 0;

    public function __construct($value, $error = 0) {
        parent::__construct($value);

        $this->error = $error;
    }

    /**
     * @param mixed $a
     * @param mixed $b
     * @return bool
     */
    protected function numericComparison($a, $b)
    {
        return (abs($a - $b) <= $this->error);
    }
}

/**
 * Is the value close to another value?
 */
function closeTo($operand, $error) {
    return new IsCloseTo($operand, $closeTo);
}

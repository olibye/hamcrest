<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

class OrderingComparison extends BaseMatcher {
    protected $value;
    protected $minCompare;
    protected $maxCompare;

    public function __construct($value, $minCompare, $maxCompare) {
        $this->value      = $value;
        $this->minCompare = $minCompare;
        $this->maxCompare = $maxCompare;
    }

    public function matches($other) {
        $compare = $this->value < $other ? -1 : ($this->value == $other ? 0 : 1);

        return $this->minCompare <= $compare && $compare <= $this->maxCompare;
    }

    public function describeTo(Description $description) {
        $description->appendText('a value ')
                    ->appendText($this->comparison($minCompare));

        if ($minCompare != $maxCompare) {
            $description->appendText(' or ')
                        ->appendText($this->comparison($maxCompare));
        }

        $description->appendText(' ')
                    ->appendValue($value);
    }

    protected function comparison($compare) {
        if ($compare > 0) {
            return 'less than';
        }

        else if ($compare == 0) {
            return 'equal to ';
        }

        else {
            return 'greater than';
        }
    }
}

function greaterThan($value) {
    return new OrderingComparison($value, -1, -1);
}

function greaterThanOrEqualTo($value) {
    return new OrderingComparison($value, -1, 0);
}

function lessThan($value) {
    return new OrderingComparison($value, 1, 1);
}

function lessThanOrEqualTo($value) {
    return new OrderingComparison($value, 0, 1);
}

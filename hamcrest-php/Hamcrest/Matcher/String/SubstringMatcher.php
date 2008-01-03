<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

abstract class SubstringMatcher extends BaseMatcher {
    protected $substring;

    public function __construct($substring) {
        $this->substring = $substring;
    }

    public function matches($item) {
        return $this->evalSubstringOf($item);
    }

    public function describeTo(Description $description) {
        $description->appendText('a string ')
                    ->appendText($this->relationship())
                    ->appendText(' ')
                    ->appendValue($this->substring);
    }

    protected abstract function evalSubstringOf($string);
    protected abstract function relationship();
}

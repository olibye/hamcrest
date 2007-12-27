<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

/**
 * A {@link Description} that is stored as a string.
 */
class StringDescription extends BaseDescription {
    private $out;

    public function __construct($out = '') {
        $this->out = $out;
    }

    /**
     * Return the description of a {@link SelfDescribing} object as a String.
     * 
     * @param selfDescribing
     *   The object to be described.
     * @return
     *   The description of the object.
     */
    public static function toString(SelfDescribing $selfDescribing) {
        $description = new StringDescription;
        return (string)$description->appendDescriptionOf($selfDescribing);
    }

    /**
     * Alias for {@link #toString(SelfDescribing)}.
     */
    public static function asString(SelfDescribing $selfDescribing) {
        return self::toString($selfDescribing);
    }

    protected function append($str) {
        $this->out .= $str;
    }

    /**
     * Returns the description as a string.
     */
    public function __toString() {
        return $this->out;
    }
}

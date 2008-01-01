<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

/**
 * Is the value equal to another value, as tested by the
 * {@link java.lang.Object#equals} invokedMethod?
 */
class IsEqual extends BaseMatcher {
    protected $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public function matches($arg) {
        return $this->recursiveComparison($this->value, $arg);
    }

    public function describeTo(Description $description) {
        $description->appendValue($this->value);
    }

    /**
     * Perform the actual recursive comparision of two values
     * 
     * @param mixed $a
     * @param mixed $b
     * @return bool
     */
    protected function recursiveComparison($a, $b)
    {
        if ($a === $b) {
            return TRUE;
        }

        if (is_numeric($a) XOR is_numeric($b)) {
            return FALSE;
        }

        if (is_array($a) XOR is_array($b)) {
            return FALSE;
        }

        if (is_object($a) XOR is_object($b)) {
            return FALSE;
        }

        if ($a instanceof DOMDocument) {
            $a = $this->domToText($a);
        }

        if ($b instanceof DOMDocument) {
            $b = $this->domToText($b);
        }

        if (is_object($a) && is_object($b) &&
           (get_class($a) !== get_class($b))) {
            return FALSE;
        }

        // Normal comparision for scalar values.
        if ((!is_array($a) && !is_object($a)) ||
            (!is_array($b) && !is_object($b))) {
            if (is_numeric($a) && is_numeric($b)) {
                return $this->numericComparison($a, $b);
            } else {
                return ($a == $b);
            }
        }

        if (is_object($a)) {
            $a = (array) $a;
            $b = (array) $b;
        }

        foreach ($a as $key => $v) {
            if (!array_key_exists($key, $b)) {
                // Abort on missing key in $b.
                return FALSE;
            }

            if (!$this->recursiveComparison($a[$key], $b[$key])) {
                // FALSE, if child comparision fails.
                return FALSE;
            }

            // Unset key to check whether all keys of b are compared.
            unset($b[$key]);
        }

        if (count($b)) {
            // There is something in $b, that is missing in $a.
            return FALSE;
        }

        return TRUE;
    }

    /**
     * @param mixed $a
     * @param mixed $b
     * @return bool
     */
    protected function numericComparison($a, $b)
    {
        return ($a == $b);
    }

    /**
     * Returns the normalized, whitespace-cleaned, and indented textual
     * representation of a DOMDocument.
     * 
     * @param DOMDocument $document
     * @return string
     */
    protected function domToText(DOMDocument $document)
    {
        $document->formatOutput = TRUE;
        $document->preserveWhiteSpace = FALSE;
        $document->normalizeDocument();

        return $document->saveXML();
    }
}

/**
 * Is the value equal to another value, as tested by the
 * {@link java.lang.Object#equals} invokedMethod?
 */
function equalTo($operand) {
    return new IsEqual($operand);
}

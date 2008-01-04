<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

/**
 * A {@link Description} that is stored as a string.
 */
abstract class BaseDescription implements Description {
    public function appendText($text) {
        $this->append($text);

        return $this;
    }

    public function appendDescriptionOf(SelfDescribing $value) {
        $value->describeTo($this);

        return $this;
    }

    public function appendValue($value) {
        if ($value == NULL) {
            $this->append('null');
        } else if ($value === TRUE) {
            $this->append('true');
        } else if ($value === FALSE) {
            $this->append('false');
        } else if (is_string($value)) {
            $this->toPhpSyntax($value);
        } else if (is_float($value)) {
            $this->append('<' . $value . 'F>');
        } else if (is_array($value) || (is_object($value) && $value instanceof Iterator)) {
            $this->appendList('[', ', ', ']', $value);
        } else {
            $this->append('<' . $value . '>');
        }

        return $this;
    }

    /**
     * Appends a list of objects or values to the description.
     */
    public function appendList($start, $separator, $end, $values) {
        $separate = FALSE;

        $this->append($start);

        foreach ($values as $value) {
            if ($separate) {
                $this->append($separator);
            }

            $this->appendDescriptionOf($value);

            $separate = TRUE;
        }

        $this->append($end);

        return $this;
    }

    /** Append the char <var>c</var> to the description.  
     */
    protected abstract function append($str);

    private function toPhpSyntax($unformatted) {
        $buffer = '"';

        $length = strlen($unformatted);

        for ($i = 0; $i < $length; $i++) {
            switch ($unformatted[$i]) {
                case '"':
                    $buffer .= "\\\"";
                    break;
                case '\n':
                    $buffer .= "\\n";
                    break;
                case '\r':
                    $buffer .= "\\r";
                    break;
                case '\t':
                    $buffer .= "\\t";
                    break;
                default:
                    $buffer .= $unformatted[$i];
            }
        }

        $this->append($buffer . '"');
    }
}

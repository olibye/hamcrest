<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

class MatcherAssert {
    public static function assertThat() {
        $args = func_get_args();

        if (count($args) == 2) {
            if ($args[1] instanceof Matcher) {
                self::doAssert('', $args[0], $args[1]);
            }

            else if (is_string($args[0]) && is_bool($args[1])) {
                if (!$args[1]) {
                    throw new AssertionError($args[0]);
                }
            }

            else {
                throw new InvalidArgumentException;
            }
        }

        else if (count($args) == 3 && is_string($args[0]) && $args[2] instanceof Matcher) {
            self::doAssert($args[0], $args[1], $args[2]);
        }

        else {
            throw new InvalidArgumentException;
        }
    }

    protected static function doAssert($reason, $actual, Matcher $matcher) {
        if (!$matcher->matches($actual)) {
            $description = new StringDescription;
            $description->appendText($reason)
                        ->appendText("\nExpected: ")
                        ->appendDescriptionOf($matcher)
                        ->appendText("\n     got: ")
                        ->appendValue($actual)
                        ->appendText("\n");
            
            throw new AssertionError((string)$description);
        }
    }
}

function assertThat() {
    $args = func_get_args();
    call_user_func_array(array('Hamcrest::MatcherAssert', 'assertThat'), $args);
}

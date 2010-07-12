<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/Matcher.php';
require_once 'Hamcrest/StringDescription.php';
require_once 'Hamcrest/AssertionError.php';
require_once 'Hamcrest/Core/IsEqual.php';

class Hamcrest_MatcherAssert
{
  
  /**
   * Make an assertion and throw {@link Hamcrest_AssertionError} if it fails.
   *
   * If the third parameter is not a matcher it is wrapped
   * with {@link Hamcrest_Core_IsEqual#equalTo}.
   * 
   * Example:
   * <pre>
   * // With an identifier
   * assertThat("assertion identifier", $apple->flavour(), equalTo("tasty"));
   * // Without an identifier
   * assertThat($apple->flavour(), equalTo("tasty"));
   * // Evaluating a boolean expression
   * assertThat("some error", $a > $b);
   * assertThat($a > $b);
   * </pre>
   */
  public static function assertThat(/* $args ... */)
  {
    $args = func_get_args();
    switch (count($args))
    {
      case 1:
        if (!$args[0])
        {
          throw new Hamcrest_AssertionError();
        }
        break;

      case 2:
        if ($args[1] instanceof Hamcrest_Matcher)
        {
          self::doAssert('', $args[0], $args[1]);
        }
        elseif (!$args[1])
        {
          throw new Hamcrest_AssertionError($args[0]);
        }
        break;

      case 3:
        if ($args[2] instanceof Hamcrest_Matcher)
        {
          self::doAssert($args[0], $args[1], $args[2]);
        }
        else
        {
          self::doAssert($args[0], $args[1], Hamcrest_Core_IsEqual::equalTo($args[2]));
        }
        break;
      
      default:
        throw new InvalidArgumentException();
    }
  }
  
  // -- Private Methods
  
  private static function doAssert($reason, $actual,
    Hamcrest_Matcher $matcher)
  {
    if (!$matcher->matches($actual))
    {
      $description = new Hamcrest_StringDescription();
      $description->appendText($reason)
                  ->appendText(PHP_EOL . 'Expected: ')
                  ->appendDescriptionOf($matcher)
                  ->appendText(PHP_EOL . '     but: ');
      
      $matcher->describeMismatch($actual, $description);
      
      throw new Hamcrest_AssertionError((string) $description);
    }
  }
  
}

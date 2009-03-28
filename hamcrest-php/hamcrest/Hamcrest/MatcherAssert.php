<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/Matcher.php';
require_once 'Hamcrest/StringDescription.php';
require_once 'Hamcrest/AssertionError.php';

class Hamcrest_MatcherAssert
{
  
  /**
   * Make an assertion and throw {@link Hamcrest_AssertionError} if fails.
   * 
   * Example:
   * <pre>
   * //With an identifier
   * assertThat("assertion identifier", $apple->flavour(), equalTo("tasty"));
   * //Without an identifier
   * assertThat($apple->flavour(), equalTo("tasty"));
   * //Evaluating a boolean expression
   * assertThat("some error", $a > $b);
   * </pre>
   */
  public static function assertThat(/* $args ... */)
  {
    $args = func_get_args();
    if (isset($args[2]) && $args[2] instanceof Hamcrest_Matcher)
    {
      return self::doAssert($args[0], $args[1], $args[2]);
    }
    elseif (isset($args[1]) && $args[1] instanceof Hamcrest_Matcher)
    {
      return self::assertThat('', $args[0], $args[1]);
    }
    elseif (array_key_exists(1, $args))
    {
      if (!$args[1])
      {
        throw new Hamcrest_AssertionError($args[0]);
      }
    }
    
    throw new InvalidArgumentException();
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

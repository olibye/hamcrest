<?php

/*
 Copyright (c) 2009-2010 hamcrest.org
 */

// This file is generated from the static method @factory doctags.

require_once 'Hamcrest/Matcher.php';
require_once 'Hamcrest/Array/IsArray.php';
require_once 'Hamcrest/Array/IsArrayContaining.php';
require_once 'Hamcrest/Array/IsArrayContainingInAnyOrder.php';
require_once 'Hamcrest/Array/IsArrayContainingInOrder.php';
require_once 'Hamcrest/Array/IsArrayContainingKey.php';
require_once 'Hamcrest/Array/IsArrayContainingKeyValuePair.php';
require_once 'Hamcrest/Array/IsArrayWithSize.php';
require_once 'Hamcrest/Collection/IsEmptyTraversable.php';
require_once 'Hamcrest/Collection/IsTraversableWithSize.php';
require_once 'Hamcrest/Core/AllOf.php';
require_once 'Hamcrest/Core/AnyOf.php';
require_once 'Hamcrest/Core/CombinableMatcher.php';
require_once 'Hamcrest/Core/DescribedAs.php';
require_once 'Hamcrest/Core/Every.php';
require_once 'Hamcrest/Core/HasToString.php';
require_once 'Hamcrest/Core/Is.php';
require_once 'Hamcrest/Core/IsAnything.php';
require_once 'Hamcrest/Core/IsCollectionContaining.php';
require_once 'Hamcrest/Core/IsEqual.php';
require_once 'Hamcrest/Core/IsIdentical.php';
require_once 'Hamcrest/Core/IsInstanceOf.php';
require_once 'Hamcrest/Core/IsNot.php';
require_once 'Hamcrest/Core/IsNull.php';
require_once 'Hamcrest/Core/IsSame.php';
require_once 'Hamcrest/Core/IsSet.php';
require_once 'Hamcrest/Core/IsTypeOf.php';
require_once 'Hamcrest/Number/IsCloseTo.php';
require_once 'Hamcrest/Number/OrderingComparison.php';
require_once 'Hamcrest/Text/IsEmptyString.php';
require_once 'Hamcrest/Text/IsEqualIgnoringCase.php';
require_once 'Hamcrest/Text/IsEqualIgnoringWhiteSpace.php';
require_once 'Hamcrest/Text/MatchesPattern.php';
require_once 'Hamcrest/Text/StringContains.php';
require_once 'Hamcrest/Text/StringContainsIgnoringCase.php';
require_once 'Hamcrest/Text/StringContainsInOrder.php';
require_once 'Hamcrest/Text/StringEndsWith.php';
require_once 'Hamcrest/Text/StringStartsWith.php';
require_once 'Hamcrest/Type/IsArray.php';
require_once 'Hamcrest/Type/IsBoolean.php';
require_once 'Hamcrest/Type/IsCallable.php';
require_once 'Hamcrest/Type/IsDouble.php';
require_once 'Hamcrest/Type/IsInteger.php';
require_once 'Hamcrest/Type/IsNumeric.php';
require_once 'Hamcrest/Type/IsObject.php';
require_once 'Hamcrest/Type/IsResource.php';
require_once 'Hamcrest/Type/IsScalar.php';
require_once 'Hamcrest/Type/IsString.php';
require_once 'Hamcrest/Xml/HasXPath.php';

/**
 * A series of static factories for all hamcrest matchers.
 */
class Hamcrest_Matchers
{

  /**
   * Evaluates to true only if each $matcher[$i] is satisfied by $array[$i].
   */
  public static function anArray($array)
  {
    return Hamcrest_Array_IsArray::anArray($array);
  }

  /**
   * Evaluates to true if any item in an array satisfies the given matcher.
   * 
   * @param mixed $item as a {@link Hamcrest_Matcher} or a value.
   */
  public static function hasItemInArray($item)
  {
    return Hamcrest_Array_IsArrayContaining::hasItemInArray($item);
  }

  /**
   * Evaluates to true if any item in an array satisfies the given matcher.
   * 
   * @param mixed $item as a {@link Hamcrest_Matcher} or a value.
   */
  public static function hasValue($item)
  {
    return Hamcrest_Array_IsArrayContaining::hasItemInArray($item);
  }

  /**
   * An array with elements that match the given matchers.
   */
  public static function arrayContainingInAnyOrder(array $items)
  {
    return Hamcrest_Array_IsArrayContainingInAnyOrder::arrayContainingInAnyOrder($items);
  }

  /**
   * An array with elements that match the given matchers.
   */
  public static function containsInAnyOrder(array $items)
  {
    return Hamcrest_Array_IsArrayContainingInAnyOrder::arrayContainingInAnyOrder($items);
  }

  /**
   * An array with elements that match the given matchers in the same order.
   */
  public static function arrayContaining(array $items)
  {
    return Hamcrest_Array_IsArrayContainingInOrder::arrayContaining($items);
  }

  /**
   * An array with elements that match the given matchers in the same order.
   */
  public static function contains(array $items)
  {
    return Hamcrest_Array_IsArrayContainingInOrder::arrayContaining($items);
  }

  /**
   * Evaluates to true if any key in an array matches the given matcher.
   * 
   * @param mixed $key as a {@link Hamcrest_Matcher} or a value.
   */
  public static function hasKeyInArray($key)
  {
    return Hamcrest_Array_IsArrayContainingKey::hasKeyInArray($key);
  }

  /**
   * Evaluates to true if any key in an array matches the given matcher.
   * 
   * @param mixed $key as a {@link Hamcrest_Matcher} or a value.
   */
  public static function hasKey($key)
  {
    return Hamcrest_Array_IsArrayContainingKey::hasKeyInArray($key);
  }

  /**
   * Test if an array has both an key and value in parity with each other.
   */
  public static function hasKeyValuePair($key, $value)
  {
    return Hamcrest_Array_IsArrayContainingKeyValuePair::hasKeyValuePair($key, $value);
  }

  /**
   * Test if an array has both an key and value in parity with each other.
   */
  public static function hasEntry($key, $value)
  {
    return Hamcrest_Array_IsArrayContainingKeyValuePair::hasKeyValuePair($key, $value);
  }

  /**
   * Does array size satisfy a given matcher?
   */
  public static function arrayWithSize($size)
  {
    return Hamcrest_Array_IsArrayWithSize::arrayWithSize($size);
  }

  /**
   * Matches an empty array.
   */
  public static function emptyArray()
  {
    return Hamcrest_Array_IsArrayWithSize::emptyArray();
  }

  /**
   * Is traversable empty?
   */
  public static function emptyTraversable()
  {
    return Hamcrest_Collection_IsEmptyTraversable::emptyTraversable();
  }

  /**
   * Does traversable size satisfy a given matcher?
   */
  public static function traversableWithSize($size)
  {
    return Hamcrest_Collection_IsTraversableWithSize::traversableWithSize($size);
  }

  /**
   * Evaluates to true only if ALL of the passed in matchers evaluate to true.
   */
  public static function allOf(/* args... */)
  {
    $args = func_get_args();
    return call_user_func_array(array('Hamcrest_Core_AllOf', 'allOf'), $args);
  }

  /**
   * Evaluates to true if ANY of the passed in matchers evaluate to true.
   */
  public static function anyOf(/* args... */)
  {
    $args = func_get_args();
    return call_user_func_array(array('Hamcrest_Core_AnyOf', 'anyOf'), $args);
  }

  /**
   * This is useful for fluently combining matchers that must both pass.
   * For example:
   * <pre>
   *   assertThat($string, both(containsString("a"))->andAlso(containsString("b")));
   * </pre>
   */
  public static function both(Hamcrest_Matcher $matcher)
  {
    return Hamcrest_Core_CombinableMatcher::both($matcher);
  }

  /**
   * This is useful for fluently combining matchers where either may pass,
   * for example:
   * <pre>
   *   assertThat($string, either(containsString("a"))->orElse(containsString("b")));
   * </pre>
   */
  public static function either(Hamcrest_Matcher $matcher)
  {
    return Hamcrest_Core_CombinableMatcher::either($matcher);
  }

  /**
   * Wraps an existing matcher and overrides the description when it fails.
   */
  public static function describedAs(/* args... */)
  {
    $args = func_get_args();
    return call_user_func_array(array('Hamcrest_Core_DescribedAs', 'describedAs'), $args);
  }

  /**
   * @param Hamcrest_Matcher $itemMatcher
   *   A matcher to apply to every element in an array.
   * 
   * @return Hamcrest_Core_Every
   *   Evaluates to TRUE for a collection in which every item matches $itemMatcher
   */
  public static function everyItem(Hamcrest_Matcher $itemMatcher)
  {
    return Hamcrest_Core_Every::everyItem($itemMatcher);
  }

  /**
   * Does array size satisfy a given matcher?
   */
  public static function hasToString($matcher)
  {
    return Hamcrest_Core_HasToString::hasToString($matcher);
  }

  /**
   * Decorates another Matcher, retaining the behavior but allowing tests
   * to be slightly more expressive.
   * 
   * For example:  assertThat($cheese, equalTo($smelly))
   *          vs.  assertThat($cheese, is(equalTo($smelly)))
   */
  public static function is($value)
  {
    return Hamcrest_Core_Is::is($value);
  }

  /**
   * This matcher always evaluates to true.
   * 
   * @param string $description A meaningful string used when describing itself.
   */
  public static function anything($description = 'ANYTHING')
  {
    return Hamcrest_Core_IsAnything::anything($description);
  }

  /**
   * Test if the value is an array containing this matcher.
   * 
   * Example:
   * <pre>
   * assertThat(array('a', 'b'), hasItem(equalTo('b')));
   * //Convenience defaults to equalTo()
   * assertThat(array('a', 'b'), hasItem('b'));
   * </pre>
   */
  public static function hasItem(/* args... */)
  {
    $args = func_get_args();
    return call_user_func_array(array('Hamcrest_Core_IsCollectionContaining', 'hasItem'), $args);
  }

  /**
   * Test if the value is an array containing elements that match all of these
   * matchers.
   * 
   * Example:
   * <pre>
   * assertThat(array('a', 'b', 'c'), hasItems(equalTo('a'), equalTo('b')));
   * </pre>
   */
  public static function hasItems(/* args... */)
  {
    $args = func_get_args();
    return call_user_func_array(array('Hamcrest_Core_IsCollectionContaining', 'hasItems'), $args);
  }

  /**
   * Is the value equal to another value, as tested by the use of the "=="
   * comparison operator?
   */
  public static function equalTo($item)
  {
    return Hamcrest_Core_IsEqual::equalTo($item);
  }

  /**
   * Tests of the value is identical to $value as tested by the "===" operator.
   */
  public static function identicalTo($value)
  {
    return Hamcrest_Core_IsIdentical::identicalTo($value);
  }

  /**
   * Is the value an instance of a particular type?
   * This version assumes no relationship between the required type and
   * the signature of the method that sets it up, for example in
   * <code>assertThat($anObject, anInstanceOf('Thing'));</code>
   */
  public static function anInstanceOf($theClass)
  {
    return Hamcrest_Core_IsInstanceOf::anInstanceOf($theClass);
  }

  /**
   * Is the value an instance of a particular type?
   * This version assumes no relationship between the required type and
   * the signature of the method that sets it up, for example in
   * <code>assertThat($anObject, anInstanceOf('Thing'));</code>
   */
  public static function any($theClass)
  {
    return Hamcrest_Core_IsInstanceOf::anInstanceOf($theClass);
  }

  /**
   * Matches if value does not match $value.
   */
  public static function not($value)
  {
    return Hamcrest_Core_IsNot::not($value);
  }

  /**
   * Matches if value is null.
   */
  public static function nullValue()
  {
    return Hamcrest_Core_IsNull::nullValue();
  }

  /**
   * Matches if value is not null.
   */
  public static function notNullValue()
  {
    return Hamcrest_Core_IsNull::notNullValue();
  }

  /**
   * Creates a new instance of IsSame.
   * 
   * @param mixed $object
   *   The predicate evaluates to true only when the argument is
   *   this object.
   */
  public static function sameInstance($object)
  {
    return Hamcrest_Core_IsSame::sameInstance($object);
  }

  /**
   * Matches if value (class, object, or array) has named $property.
   */
  public static function set($property)
  {
    return Hamcrest_Core_IsSet::set($property);
  }

  /**
   * Matches if value (class, object, or array) does not have named $property.
   */
  public static function notSet($property)
  {
    return Hamcrest_Core_IsSet::notSet($property);
  }

  /**
   * Is the value a particular built-in type?
   */
  public static function typeOf($theType)
  {
    return Hamcrest_Core_IsTypeOf::typeOf($theType);
  }

  /**
   * Matches if value is a number equal to $value within some range of
   * acceptable error $delta.
   */
  public static function closeTo($value, $delta)
  {
    return Hamcrest_Number_IsCloseTo::closeTo($value, $delta);
  }

  /**
   * The value is not > $value, nor < $value.
   */
  public static function comparesEqualTo($value)
  {
    return Hamcrest_Number_OrderingComparison::comparesEqualTo($value);
  }

  /**
   * The value is > $value.
   */
  public static function greaterThan($value)
  {
    return Hamcrest_Number_OrderingComparison::greaterThan($value);
  }

  /**
   * The value is >= $value.
   */
  public static function greaterThanOrEqualTo($value)
  {
    return Hamcrest_Number_OrderingComparison::greaterThanOrEqualTo($value);
  }

  /**
   * The value is >= $value.
   */
  public static function atLeast($value)
  {
    return Hamcrest_Number_OrderingComparison::greaterThanOrEqualTo($value);
  }

  /**
   * The value is < $value.
   */
  public static function lessThan($value)
  {
    return Hamcrest_Number_OrderingComparison::lessThan($value);
  }

  /**
   * The value is <= $value.
   */
  public static function lessThanOrEqualTo($value)
  {
    return Hamcrest_Number_OrderingComparison::lessThanOrEqualTo($value);
  }

  /**
   * The value is <= $value.
   */
  public static function atMost($value)
  {
    return Hamcrest_Number_OrderingComparison::lessThanOrEqualTo($value);
  }

  /**
   * Matches if value is zero-length string.
   */
  public static function isEmptyString()
  {
    return Hamcrest_Text_IsEmptyString::isEmptyString();
  }

  /**
   * Matches if value is zero-length string.
   */
  public static function emptyString()
  {
    return Hamcrest_Text_IsEmptyString::isEmptyString();
  }

  /**
   * Matches if value is null or zero-length string.
   */
  public static function isEmptyOrNullString()
  {
    return Hamcrest_Text_IsEmptyString::isEmptyOrNullString();
  }

  /**
   * Matches if value is null or zero-length string.
   */
  public static function nullOrEmptyString()
  {
    return Hamcrest_Text_IsEmptyString::isEmptyOrNullString();
  }

  /**
   * Matches if value is a string equal to $string, regardless of the case.
   */
  public static function equalToIgnoringCase($string)
  {
    return Hamcrest_Text_IsEqualIgnoringCase::equalToIgnoringCase($string);
  }

  /**
   * Matches if value is a string equal to $string, regardless of whitespace.
   */
  public static function equalToIgnoringWhiteSpace($string)
  {
    return Hamcrest_Text_IsEqualIgnoringWhiteSpace::equalToIgnoringWhiteSpace($string);
  }

  /**
   * Matches if value is a string that matches regular expression $pattern.
   */
  public static function matchesPattern($pattern)
  {
    return Hamcrest_Text_MatchesPattern::matchesPattern($pattern);
  }

  /**
   * Matches if value is a string that contains $substring.
   */
  public static function containsString($substring)
  {
    return Hamcrest_Text_StringContains::containsString($substring);
  }

  /**
   * Matches if value is a string that contains $substring regardless of the case.
   */
  public static function containsStringIgnoringCase($substring)
  {
    return Hamcrest_Text_StringContainsIgnoringCase::containsStringIgnoringCase($substring);
  }

  /**
   * Matches if value contains $substrings in a constrained order.
   */
  public static function stringContainsInOrder(array $substrings)
  {
    return Hamcrest_Text_StringContainsInOrder::stringContainsInOrder($substrings);
  }

  /**
   * Matches if value is a string that ends with $substring.
   */
  public static function endsWith($substring)
  {
    return Hamcrest_Text_StringEndsWith::endsWith($substring);
  }

  /**
   * Matches if value is a string that starts with $substring.
   */
  public static function startsWith($substring)
  {
    return Hamcrest_Text_StringStartsWith::startsWith($substring);
  }

  /**
   * Is the value an array?
   */
  public static function arrayValue()
  {
    return Hamcrest_Type_IsArray::arrayValue();
  }

  /**
   * Is the value a boolean?
   */
  public static function booleanValue()
  {
    return Hamcrest_Type_IsBoolean::booleanValue();
  }

  /**
   * Is the value a boolean?
   */
  public static function boolValue()
  {
    return Hamcrest_Type_IsBoolean::booleanValue();
  }

  /**
   * Is the value callable?
   */
  public static function callable()
  {
    return Hamcrest_Type_IsCallable::callable();
  }

  /**
   * Is the value a float/double?
   */
  public static function doubleValue()
  {
    return Hamcrest_Type_IsDouble::doubleValue();
  }

  /**
   * Is the value a float/double?
   */
  public static function floatValue()
  {
    return Hamcrest_Type_IsDouble::doubleValue();
  }

  /**
   * Is the value an integer?
   */
  public static function integerValue()
  {
    return Hamcrest_Type_IsInteger::integerValue();
  }

  /**
   * Is the value an integer?
   */
  public static function intValue()
  {
    return Hamcrest_Type_IsInteger::integerValue();
  }

  /**
   * Is the value a numeric?
   */
  public static function numericValue()
  {
    return Hamcrest_Type_IsNumeric::numericValue();
  }

  /**
   * Is the value an object?
   */
  public static function objectValue()
  {
    return Hamcrest_Type_IsObject::objectValue();
  }

  /**
   * Is the value an object?
   */
  public static function anObject()
  {
    return Hamcrest_Type_IsObject::objectValue();
  }

  /**
   * Is the value a resource?
   */
  public static function resourceValue()
  {
    return Hamcrest_Type_IsResource::resourceValue();
  }

  /**
   * Is the value a scalar (boolean, integer, double, or string)?
   */
  public static function scalarValue()
  {
    return Hamcrest_Type_IsScalar::scalarValue();
  }

  /**
   * Is the value a string?
   */
  public static function stringValue()
  {
    return Hamcrest_Type_IsString::stringValue();
  }

  /**
   * Wraps <code>$matcher</code> with {@link Hamcrest_Core_IsEqual)
   * if it's not a matcher and the XPath in <code>count()</code>
   * if it's an integer.
   */
  public static function hasXPath($xpath, $matcher = null)
  {
    return Hamcrest_Xml_HasXPath::hasXPath($xpath, $matcher);
  }

}

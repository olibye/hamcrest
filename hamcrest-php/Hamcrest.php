<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
require_once 'Hamcrest/SelfDescribing.php';
require_once 'Hamcrest/Description.php';
require_once 'Hamcrest/BaseDescription.php';
require_once 'Hamcrest/StringDescription.php';
require_once 'Hamcrest/Matcher.php';
require_once 'Hamcrest/BaseMatcher.php';

require_once 'Hamcrest/Matcher/ShortcutCombination.php';
require_once 'Hamcrest/Matcher/AllOf.php';
require_once 'Hamcrest/Matcher/AnyOf.php';
require_once 'Hamcrest/Matcher/DescribedAs.php';
require_once 'Hamcrest/Matcher/IsAnything.php';
require_once 'Hamcrest/Matcher/IsEqual.php';
require_once 'Hamcrest/Matcher/IsCloseTo.php';
require_once 'Hamcrest/Matcher/IsEqualIgnoringCase.php';
require_once 'Hamcrest/Matcher/IsEqualIgnoringWhiteSpace.php';
require_once 'Hamcrest/Matcher/IsInstanceOf.php';
require_once 'Hamcrest/Matcher/IsNot.php';
require_once 'Hamcrest/Matcher/IsNull.php';
require_once 'Hamcrest/Matcher/Is.php';
require_once 'Hamcrest/Matcher/IsSame.php';
require_once 'Hamcrest/Matcher/SubstringMatcher.php';
require_once 'Hamcrest/Matcher/StringContains.php';
require_once 'Hamcrest/Matcher/StringEndsWith.php';
require_once 'Hamcrest/Matcher/StringStartsWith.php';

if (!defined('HAMCREST_DO_NOT_ALIAS_FUNCTIONS_IN_GLOBAL_SCOPE')) {
    function allOf($matchers) {
        return Hamcrest::allOf($matchers);
    }

    function anyOf($matchers) {
        return Hamcrest::anyOf($matchers);
    }

    function anInstanceOf($type) {
        return Hamcrest::anInstanceOf($type);
    }

    function anything($description = 'ANYTHING') {
        return Hamcrest::anything($description);
    }

    function closeTo($operand, $error) {
        return Hamcrest::closeTo($operand, $error);
    }

    function containsString($substring) {
        return Hamcrest::containsString($substring);
    }

    function describedAs($description, Matcher $matcher, array $values) {
        return Hamcrest::describedAs($description, $matcher, $values);
    }

    function endsWith($substring) {
        return Hamcrest::endsWith($substring);
    }

    function equalTo($operand) {
        return Hamcrest::equalTo($operand);
    }

    function equalToIgnoringCase($string) {
        return Hamcrest::equalToIgnoringCase($string);
    }

    function equalToIgnoringWhiteSpace($string) {
        return Hamcrest::equalToIgnoringWhiteSpace($string);
    }

    function is(Matcher $matcher) {
        return Hamcrest::is($matcher);
    }

    function not($matcherOrValue) {
        return Hamcrest::not($matcherOrValue);
    }

    function notNullValue() {
        return Hamcrest::notNullValue();
    }

    function sameInstance($object) {
        return Hamcrest::sameInstance($object);
    }

    function startsWith($substring) {
        return Hamcrest::startsWith($substring);
    }
}

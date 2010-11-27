__author__ = "Jon Reid"
__copyright__ = "Copyright 2010 www.hamcrest.org"
__license__ = "BSD, see License.txt"
__version__ = "1.0"

from hamcrest.core.base_matcher import BaseMatcher


class IsEqualIgnoringCase(BaseMatcher):
    """Matches if strings are equal ignoring case."""

    def __init__(self, string):
        if not isinstance(string, str):
            raise TypeError('IsEqualIgnoringCase requires string')
        self.original_string = string
        self.lowered_string = string.lower()

    def _matches(self, item):
        if not isinstance(item, str):
            return False
        return self.lowered_string == item.lower()

    def describe_to(self, description):
        description.append_text('equal_to_ignoring_case(')  \
                    .append_value(self.original_string)     \
                    .append_text(')')


def equal_to_ignoring_case(string):
    """Are the strings equal, ignoring case?"""
    return IsEqualIgnoringCase(string)

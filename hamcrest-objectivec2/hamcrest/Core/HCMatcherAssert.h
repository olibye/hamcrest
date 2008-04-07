@protocol HCMatcher;


extern "C"
{

void HC_assertThat(id actual, id<HCMatcher> matcher, const char* fileName, int lineNumber);

}


#ifdef HC_SHORTHAND
#define assertThat(actual, matcher) HC_assertThat(actual, matcher, __FILE__, __LINE__)
#endif


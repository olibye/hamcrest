#import <SenTestingKit/SenTestingKit.h>

@protocol HCMatcher;


@interface AbstractMatcherTest : SenTestCase

- (void) assertTrue:(BOOL)condition message:(NSString*)message
                inFile:(const char*)fileName atLine:(int)lineNumber;
- (void) assertFalse:(BOOL)condition message:(NSString*)message
                inFile:(const char*)fileName atLine:(int)lineNumber;
- (void) assertMatcher:(id<HCMatcher>)matcher hasTheDescription:(NSString*)expected
                inFile:(const char*)fileName atLine:(int)lineNumber;

- (id<HCMatcher>) createMatcher;

@end


#define assertMatches(aMessage, matcher, arg)    \
    [self assertTrue:[matcher matches:arg] message:aMessage inFile:__FILE__ atLine:__LINE__]

#define assertDoesNotMatch(aMessage, matcher, arg)    \
    [self assertFalse:[matcher matches:arg] message:aMessage inFile:__FILE__ atLine:__LINE__]

#define assertDescription(expected, matcher)    \
    [self assertMatcher:matcher hasTheDescription:expected inFile:__FILE__ atLine:__LINE__]

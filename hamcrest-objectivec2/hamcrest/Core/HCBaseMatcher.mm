#import "HCBaseMatcher.h"

#import "HCStringDescription.h"


@interface HCBaseMatcher (Private)
- (void) subclassResponsibility:(SEL)command;
@end

@implementation HCBaseMatcher (Private)

- (void) subclassResponsibility:(SEL)command
{
    [NSException raise:NSGenericException
                format:@"-[%@  %s] not implemented", [self className], command];
}

@end

#define ABSTRACT_METHOD [self subclassResponsibility:_cmd]


/**
    Base class for all Matcher implementations.
    
    Most implementations can just implement matches: and let matches:describingMismatchTo: call
    it. But if it makes more sense to generate the mismatch description during the matching,
    override matches:describingMismatchTo: and have matches: call it with a nil description.
*/
@implementation HCBaseMatcher

- (NSString*) description
{
    return [HCStringDescription stringFrom:self];
}


- (BOOL) matches:(id)item
{
    ABSTRACT_METHOD;
    return NO;
}


- (BOOL) matches:(id)item describingMismatchTo:(id<HCDescription>)mismatchDescription
{
    BOOL matchResult = [self matches:item];
    if (!matchResult)
        [self describeMismatchOf:item to:mismatchDescription];
    return matchResult;
}


- (void) describeMismatchOf:(id)item to:(id<HCDescription>)mismatchDescription
{
    [[mismatchDescription appendText:@"was "] appendValue:item];
}


- (void) describeTo:(id<HCDescription>)description
{
    ABSTRACT_METHOD;
}

@end

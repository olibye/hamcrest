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


- (void) describeTo:(id<HCDescription>)description
{
    ABSTRACT_METHOD;
}

@end

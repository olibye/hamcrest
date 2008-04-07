#import "HCAllOf.h"

#import "HCDescription.h"


@implementation HCAllOf

+ (HCAllOf*) allOf:(NSArray*)theMatchers
{
    return [[[HCAllOf alloc] initWithMatchers:theMatchers] autorelease];
}


- (BOOL) matches:(id)item
{
    return [self pMatches:item shortcut:NO];
}


- (void) describeTo:(id<HCDescription>)description
{
    return [self pDescribeTo:description operatorName:@"and"];
}

@end


extern "C" {

id<HCMatcher> HC_allOf(id<HCMatcher> matcher, ...)
{
    va_list args;
    va_start(args, matcher);
    NSArray* matcherList = HC_collectMatchers(matcher, args);
    va_end(args);
    
    return [HCAllOf allOf:matcherList];
}

}   // extern "C"

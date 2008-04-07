#import "HCAnyOf.h"

#import "HCDescription.h"


@implementation HCAnyOf

+ (HCAnyOf*) anyOf:(NSArray*)theMatchers
{
    return [[[HCAnyOf alloc] initWithMatchers:theMatchers] autorelease];
}


- (BOOL) matches:(id)item
{
    return [self pMatches:item shortcut:YES];
}


- (void) describeTo:(id<HCDescription>)description
{
    return [self pDescribeTo:description operatorName:@"or"];
}

@end


extern "C" {

id<HCMatcher> HC_anyOf(id<HCMatcher> matcher, ...)
{
    va_list args;
    va_start(args, matcher);
    NSArray* matcherList = HC_collectMatchers(matcher, args);
    va_end(args);
    
    return [HCAnyOf anyOf:matcherList];
}

}   // extern "C"

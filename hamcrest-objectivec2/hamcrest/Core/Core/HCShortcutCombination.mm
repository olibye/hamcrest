#import "HCShortcutCombination.h"

#import "HCDescription.h"


@implementation HCShortcutCombination

- (id) initWithMatchers:(NSArray*)theMatchers
{
    self = [super init];
    if (self != nil)
        matchers = [theMatchers retain];
    return self;
}


- (void) dealloc
{
    [matchers release];
    
    [super dealloc];
}


- (BOOL) pMatches:(id)item shortcut:(BOOL)shortcut
{
    for (id<HCMatcher> oneMatcher in matchers)
        if ([oneMatcher matches:item] == shortcut)
            return shortcut;
    return !shortcut;
}


- (void) pDescribeTo:(id<HCDescription>)description operatorName:(NSString*)operatorName
{
    NSString* paddedOperator = [[@" " stringByAppendingString:operatorName]
                                        stringByAppendingString:@" "];
    [description appendList:matchers start:@"(" separator:paddedOperator end:@")"];
}

@end


extern "C" {

NSMutableArray* HC_collectMatchers(id<HCMatcher> matcher, va_list args)
{
    NSMutableArray* matcherList = [NSMutableArray arrayWithObject:matcher];
    
    matcher = va_arg(args, id<HCMatcher>);
    while (matcher != nil)
    {
        [matcherList addObject:matcher];
        matcher = va_arg(args, id<HCMatcher>);
    }
    
    return matcherList;
}

}   // extern "C"

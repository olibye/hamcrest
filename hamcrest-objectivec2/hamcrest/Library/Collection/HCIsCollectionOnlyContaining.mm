#import "HCIsCollectionOnlyContaining.h"

#import "HCAnyOf.h"
#import "HCDescription.h"
#import "HCWrapShortcut.h"


@implementation HCIsCollectionOnlyContaining

+ (HCIsCollectionOnlyContaining*) isCollectionOnlyContaining:(id<HCMatcher>)aMatcher
{
    return [[[HCIsCollectionOnlyContaining alloc] initWithMatcher:aMatcher] autorelease];
}


- (id) initWithMatcher:(id<HCMatcher>)aMatcher
{
    self = [super init];
    if (self != nil)
        matcher = [aMatcher retain];
    return self;
}


- (void) dealloc
{
    [matcher release];
    
    [super dealloc];
}


- (BOOL) matches:(id)collection
{
    if (![collection conformsToProtocol:@protocol(NSFastEnumeration)])
        return NO;
    
    if ([collection count] == 0)
        return NO;
    
    for (id item in collection)
        if (![matcher matches:item])
            return NO;
    return YES;
}


- (void) describeTo:(id<HCDescription>)description
{
    [[description appendText:@"a collection containing items matching "]
                    appendDescriptionOf:matcher];
}

@end


extern "C" {

id<HCMatcher> HC_onlyContains(id item, ...)
{
    NSMutableArray* matcherList = [NSMutableArray arrayWithObject:HC_wrapShortcut(item)];
    
    va_list args;
    va_start(args, item);
    item = va_arg(args, id);
    while (item != nil)
    {
        [matcherList addObject:HC_wrapShortcut(item)];
        item = va_arg(args, id);
    }
    va_end(args);
    
    return [HCIsCollectionOnlyContaining isCollectionOnlyContaining:[HCAnyOf anyOf:matcherList]];
}

}   // extern "C"

#import "HCIsSame.h"

#import "HCDescription.h"


@implementation HCIsSame

+ (HCIsSame*) isSameAs:(id)anObject;
{
    return [[[HCIsSame alloc] initSameAs:anObject] autorelease];
}


- (id) initSameAs:(id)anObject
{
    self = [super init];
    if (self != nil)
        object = [anObject retain];
    return self;
}


- (void) dealloc
{
    [object release];
    
    [super dealloc];
}


- (BOOL) matches:(id)item
{
    return item == object;
}


- (void) describeTo:(id<HCDescription>)description
{
    [[[description appendText:@"same("]
                    appendValue:object]
                    appendText:@")"];
}

@end


extern "C" {

id<HCMatcher> HC_sameInstance(id anObject)
{
    return [HCIsSame isSameAs:anObject];
}

}   // extern "C"

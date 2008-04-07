#import "HCIsDictionaryContainingValue.h"

#import "HCDescription.h"
#import "HCWrapShortcut.h"


@implementation HCIsDictionaryContainingValue

+ (HCIsDictionaryContainingValue*) isDictionaryContainingValue:(id<HCMatcher>)theValueMatcher
{
    return [[[HCIsDictionaryContainingValue alloc] initWithValueMatcher:theValueMatcher] autorelease];
}


- (id) initWithValueMatcher:(id<HCMatcher>)theValueMatcher
{
    self = [super init];
    if (self != nil)
        valueMatcher = [theValueMatcher retain];
    return self;
}


- (void) dealloc
{
    [valueMatcher release];
    
    [super dealloc];
}


- (BOOL) matches:(id)dict
{
    if ([dict respondsToSelector:@selector(allValues)])
        for (id oneValue in [dict allValues])
            if ([valueMatcher matches:oneValue])
                return YES;
    return NO;
}


- (void) describeTo:(id<HCDescription>)description
{
    [[description appendText:@"dictionary with value "]
                    appendDescriptionOf:valueMatcher];
}

@end


extern "C" {

id<HCMatcher> HC_hasValue(id item)
{
    return [HCIsDictionaryContainingValue isDictionaryContainingValue:HC_wrapShortcut(item)];
}

}   // extern "C"

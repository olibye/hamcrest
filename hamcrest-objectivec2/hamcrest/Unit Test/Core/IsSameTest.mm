#import "AbstractMatcherTest.h"

#define HC_SHORTHAND
#import <hamcrest/HCIsSame.h>
#import <hamcrest/HCIsNot.h>
#import <hamcrest/HCMatcherAssert.h>


@interface IsSameTest : AbstractMatcherTest
@end

@implementation IsSameTest

- (id<HCMatcher>) createMatcher
{
    return sameInstance(@"irrelevant");
}


- (void) testEvaluatesToTrueIfArgumentIsReferenceToASpecifiedObject
{
    id o1 = [[[NSObject alloc] init] autorelease];
    id o2 = [[[NSObject alloc] init] autorelease];

    assertThat(o1, sameInstance(o1));
    assertThat(o2, isNot(sameInstance(o1)));
}


- (void) testReturnsReadableDescriptionFromToString
{
    assertDescription(@"sameInstance(\"ARG\")", sameInstance(@"ARG"));
}

@end

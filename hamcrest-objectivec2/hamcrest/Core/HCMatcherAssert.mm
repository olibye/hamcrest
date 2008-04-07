#import "HCMatcherAssert.h"

#import <SenTestingKit/SenTestingKit.h>
#import "HCStringDescription.h"
#import "HCMatcher.h"


extern "C" {

void HC_assertThat(id actual, id<HCMatcher> matcher, const char* fileName, int lineNumber)
{
    if (![matcher matches:actual])
    {
        HCStringDescription* description = [HCStringDescription stringDescription];
        [[[[description appendText:@"Expected: "]
                        appendDescriptionOf:matcher]
                        appendText:@", got: "]
                        appendValue:actual];
        @throw [NSException failureInFile: [NSString stringWithUTF8String:fileName]
                                   atLine: lineNumber
                          withDescription: [description description]];
    }
}

}   // extern "C"

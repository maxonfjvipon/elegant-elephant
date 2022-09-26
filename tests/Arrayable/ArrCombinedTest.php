<?php

namespace Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any\FirstOf;
use Maxonfjvipon\Elegant_Elephant\Any\LastOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrCombined;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumerableOf;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class ArrCombinedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function combinedWorks(): void
    {
        Assert::assertThat(
            ArrCombined::new([
                new TextOf("key1"),
                'key2',
                new NumerableOf(10),
                new FirstOf(['foo', 'bar'])
            ], [
                new TextOf('value1'),
                'value2',
                new NumerableOf(20),
                new LastOf(['bar', 'baz'])
            ])->asArray(),
            new IsEqual([
                'key1' => 'value1',
                'key2' => 'value2',
                10 => 20,
                'foo' => 'baz'
            ])
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function combinedWithArrayAsKey(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Array can't be the key of array");
        ArrCombined::new([['key']], [['value']])->asArray();
    }
}

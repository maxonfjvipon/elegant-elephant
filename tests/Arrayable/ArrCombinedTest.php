<?php

namespace Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\FirstOf;
use Maxonfjvipon\Elegant_Elephant\Scalar\LastOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrCombined;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumberOf;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class ArrCombinedTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function combinedWorks(): void
    {
        $this->assertScalarThat(
            ArrCombined([
                new TextOf("key1"),
                'key2',
                new NumberOf(10),
                new FirstOf(['foo', 'bar'])
            ], [
                new TextOf('value1'),
                'value2',
                new NumberOf(20),
                new LastOf(['bar', 'baz'])
            ])->value(),
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
        ArrCombined([['key']], [['value']])->value();
    }
}

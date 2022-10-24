<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\FirstOf;
use Maxonfjvipon\ElegantElephant\Any\LastOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrCombined;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrCombinedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function combinedWorks(): void
    {
        $this->assertMixedCastThat(
            new ArrCombined([
                new TxtOf("key1"),
                'key2',
                new NumOf(10),
                new FirstOf(['foo', 'bar'])
            ], [
                new TxtOf('value1'),
                'value2',
                new NumOf(20),
                new LastOf(['bar', 'baz'])
            ]),
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
        (new ArrCombined([['key']], [['value']]))->asArray();
    }
}

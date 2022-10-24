<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrMerged;
use Maxonfjvipon\ElegantElephant\Any\AtKey;
use Maxonfjvipon\ElegantElephant\Any\FirstOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrObject;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrObjectTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function asSingleArray(): void
    {
        $this->assertMixedCastThat(
            new ArrObject('key', 'value'),
            new IsEqual(['key' => 'value'])
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function castWorks(): void
    {
        $this->assertMixedCastThat(
            new ArrMerged(
                new ArrObject('key1', [1, 2]),
                new ArrObject('key2', "str"),
                new ArrObject('key3', new ArrOf(['foo', 'bar'])),
                new ArrObject('key4', new TxtOf("Hello")),
                new ArrObject('key5', new FirstOf([1, 2])),
                new ArrObject('key6', new NumOf(5)),
                new ArrObject('key7', 8),
                new ArrObject('key8', new AtKey('key1', ['key1' => 1, 'key2' => 2]))
            ),
            new IsEqual([
                'key1' => [1, 2],
                'key2' => 'str',
                'key3' => ['foo', 'bar'],
                'key4' => "Hello",
                'key5' => 1,
                'key6' => 5,
                'key7' => 8,
                'key8' => 1
            ])
        );
    }
}

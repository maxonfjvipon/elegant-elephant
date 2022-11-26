<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\AtKey;
use Maxonfjvipon\ElegantElephant\Any\FirstOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrMerged;
use Maxonfjvipon\ElegantElephant\Arr\ArrSingle;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrSingleTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function asSingleArray(): void
    {
        $this->assertArrThat(
            new ArrSingle('key', 'value'),
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
        $this->assertArrThat(
            new ArrMerged(
                new ArrSingle('key1', [1, 2]),
                new ArrSingle('key2', "str"),
                new ArrSingle('key3', ArrOf::array(['foo', 'bar'])),
                new ArrSingle('key4', TxtOf::str("Hello")),
                new ArrSingle('key5', new FirstOf([1, 2])),
                new ArrSingle('key6', NumOf::int(5)),
                new ArrSingle('key7', 8),
                new ArrSingle('key8', new AtKey('key1', ['key1' => 1, 'key2' => 2]))
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

<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Tests\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrMapped;
use Maxonfjvipon\ElegantElephant\Arr\ArrPlucked;
use Maxonfjvipon\ElegantElephant\Arr\ArrRange;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use PHPUnit\Framework\Constraint\IsEqual;
use stdClass;

final class ArrPluckedTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function primitiveWithoutKey(): void
    {
        $this->assertArrThat(
            new ArrPlucked(
                [
                    ['a' => 1, 'b' => 2],
                    ['a' => 1, 'b' => 2],
                    ['a' => 1, 'b' => 2],
                    ['a' => 1, 'b' => 2],
                ],
                'b'
            ),
            new IsEqual([2, 2, 2, 2])
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function primitiveWithKey(): void
    {
        $this->assertArrThat(
            new ArrPlucked(
                [
                    ['a' => 1, 'b' => 2],
                    ['a' => 3, 'b' => 4],
                    ['a' => 5, 'b' => 6],
                    ['a' => 7, 'b' => 8],
                ],
                'b',
                'a'
            ),
            new IsEqual([
                1 => 2,
                3 => 4,
                5 => 6,
                7 => 8
            ])
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function primitiveWithComplexKey(): void
    {
        $this->assertArrThat(
            new ArrPlucked(
                [
                    ['a' => 1, 'b' => 2],
                    ['a' => 3, 'b' => 4],
                    ['a' => 5, 'b' => 6],
                    ['a' => 7, 'b' => 8],
                ],
                TxtOf::str("b")
            ),
            new IsEqual([2, 4, 6, 8])
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function objectsWithoutKey(): void
    {
        $this->assertArrThat(
            new ArrPlucked(
                new ArrMapped(
                    new ArrRange(1, 4),
                    function (int $num) {
                        $obj = new stdClass();
                        $obj->prop = $num;
                        return $obj;
                    }
                ),
                "prop"
            ),
            new IsEqual([
                1, 2, 3, 4
            ])
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function objectsWithKey(): void
    {
        $this->assertArrThat(
            new ArrPlucked(
                new ArrMapped(
                    new ArrRange(1, 3),
                    function (int $num) {
                        $obj = new stdClass();
                        $obj->key = "key_$num";
                        $obj->value = "value_$num";
                        return $obj;
                    }
                ),
                'value',
                'key'
            ),
            new IsEqual([
                'key_1' => 'value_1',
                'key_2' => 'value_2',
                'key_3' => 'value_3',
            ])
        );
    }
}

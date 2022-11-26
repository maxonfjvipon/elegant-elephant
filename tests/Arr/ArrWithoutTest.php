<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrEmpty;
use Maxonfjvipon\ElegantElephant\Arr\ArrWith;
use Maxonfjvipon\ElegantElephant\Arr\ArrWithout;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEmpty;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrWithoutTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrWithoutElement(): void
    {
        $this->assertArrThat(
            new ArrWithout(
                new ArrWith(
                    new ArrEmpty(),
                    'key',
                    'value'
                ),
                'key'
            ),
            new IsEmpty()
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrWithoutNotExistedElement(): void
    {
        $this->assertArrThat(
            new ArrWithout(
                new ArrWith(
                    new ArrEmpty(),
                    'key',
                    'value'
                ),
                'value'
            ),
            new IsEqual(['key' => 'value'])
        );
    }
}

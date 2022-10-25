<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Logic\InArray;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class InArrayTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function inArray(): void
    {
        $this->assertLogicThat(
            new InArray(10, [12, 11, 10]),
            new IsTrue()
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function inArr(): void
    {
        $this->assertLogicThat(
            new InArray("H", ArrOf::array(["H", "E", "L", "L", "O"])),
            new IsTrue()
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function notInArray(): void
    {
        $this->assertLogicThat(
            new InArray(1, [2, 3, 4]),
            new IsFalse()
        );
    }
}
<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Logic\ContainsIn;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use PHPUnit\Framework\Constraint\IsTrue;

final class ContainsInTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function containsInString(): void
    {
        $this->assertLogicThat(
            new ContainsIn("h", "hello world"),
            new IsTrue()
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function containsInText(): void
    {
        $this->assertLogicThat(
            new ContainsIn("h", TxtOf::str("hello world")),
            new IsTrue()
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function containsInArray(): void
    {
        $this->assertLogicThat(
            new ContainsIn(1, [1, 2, 3]),
            new IsTrue()
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function containsInArr(): void
    {
        $this->assertLogicThat(
            new ContainsIn(10, ArrOf::array([12, 11, 10])),
            new IsTrue()
        );
    }
}
<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrEmpty;
use Maxonfjvipon\ElegantElephant\Logic\IsNotEmpty;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtBlank;
use Maxonfjvipon\ElegantElephant\Txt\TxtUpper;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class IsNotEmptyTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function isNotEmptyOfArrayIsTrue(): void
    {
        $this->assertLogicThat(
            new IsNotEmpty([]),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEmptyOfArrayIsFalse(): void
    {
        $this->assertLogicThat(
            new IsNotEmpty([1, 2, 3]),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEmptyOfArrIsTrue(): void
    {
        $this->assertLogicThat(
            new IsNotEmpty(new ArrEmpty()),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEmptyOfArrIsFalse(): void
    {
        $this->assertLogicThat(
            new IsNotEmpty(ArrOf::array([1, 2, 3])),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEmptyOfStringIsTrue(): void
    {
        $this->assertLogicThat(
            new IsNotEmpty(""),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEmptyOfStringIsFalse(): void
    {
        $this->assertLogicThat(
            new IsNotEmpty("Hello world!"),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEmptyOfTextIsTrue(): void
    {
        $this->assertLogicThat(
            new IsNotEmpty(new TxtBlank()),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEmptyOfTextIsFalse(): void
    {
        $this->assertLogicThat(
            new IsNotEmpty(new TxtUpper("foo")),
            new IsTrue()
        );
    }
}

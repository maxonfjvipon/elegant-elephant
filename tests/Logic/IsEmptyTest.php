<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrEmpty;
use Maxonfjvipon\ElegantElephant\Logic\IsEmpty;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtBlank;
use Maxonfjvipon\ElegantElephant\Txt\TxtUpper;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class IsEmptyTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfArrayIsTrue(): void
    {
        $this->assertLogicThat(
            new IsEmpty([]),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfArrayIsFalse(): void
    {
        $this->assertLogicThat(
            new IsEmpty([1, 2, 3]),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfArrIsTrue(): void
    {
        $this->assertLogicThat(
            new IsEmpty(new ArrEmpty()),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfArrIsFalse(): void
    {
        $this->assertLogicThat(
            new IsEmpty(ArrOf::array([1, 2, 3])),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfStringIsTrue(): void
    {
        $this->assertLogicThat(
            new IsEmpty(""),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfStringIsFalse(): void
    {
        $this->assertLogicThat(
            new IsEmpty("Hello world!"),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfTextIsTrue(): void
    {
        $this->assertLogicThat(
            new IsEmpty(new TxtBlank()),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfTextIsFalse(): void
    {
        $this->assertLogicThat(
            new IsEmpty(new TxtUpper("foo")),
            new IsFalse()
        );
    }
}

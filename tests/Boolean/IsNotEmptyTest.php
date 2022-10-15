<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrEmpty;
use Maxonfjvipon\Elegant_Elephant\Boolean\IsNotEmpty;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TxtBlank;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
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
        $this->assertMixedCastThat(
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
        $this->assertMixedCastThat(
            new IsNotEmpty([1, 2, 3]),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEmptyOfArrayableIsTrue(): void
    {
        $this->assertMixedCastThat(
            new IsNotEmpty(new ArrEmpty()),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEmptyOfArrayableIsFalse(): void
    {
        $this->assertMixedCastThat(
            new IsNotEmpty(new ArrayableOf([1, 2, 3])),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEmptyOfStringIsTrue(): void
    {
        $this->assertMixedCastThat(
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
        $this->assertMixedCastThat(
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
        $this->assertMixedCastThat(
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
        $this->assertMixedCastThat(
            new IsNotEmpty(new TxtUpper("foo")),
            new IsTrue()
        );
    }
}

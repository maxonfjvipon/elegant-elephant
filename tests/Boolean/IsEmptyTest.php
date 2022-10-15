<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrEmpty;
use Maxonfjvipon\Elegant_Elephant\Boolean\IsEmpty;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TxtBlank;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
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
        $this->assertMixedCastThat(
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
        $this->assertMixedCastThat(
            new IsEmpty([1, 2, 3]),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfArrayableIsTrue(): void
    {
        $this->assertMixedCastThat(
            new IsEmpty(new ArrEmpty()),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfArrayableIsFalse(): void
    {
        $this->assertMixedCastThat(
            new IsEmpty(new ArrayableOf([1, 2, 3])),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfStringIsTrue(): void
    {
        $this->assertMixedCastThat(
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
        $this->assertMixedCastThat(
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
        $this->assertMixedCastThat(
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
        $this->assertMixedCastThat(
            new IsEmpty(new TxtUpper("foo")),
            new IsFalse()
        );
    }
}

<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrEmpty;
use Maxonfjvipon\Elegant_Elephant\Logical\IsEmpty;
use Maxonfjvipon\Elegant_Elephant\Text\TxtBlank;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;
use PHPUnit\Framework\TestCase;

final class IsEmptyTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfArrayIsTrue(): void
    {
        Assert::assertThat(
            IsEmpty::new([])->asBool(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfArrayIsFalse(): void
    {
        Assert::assertThat(
            IsEmpty::new([1, 2, 3])->asBool(),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfArrayableIsTrue(): void
    {
        Assert::assertThat(
            IsEmpty::new(new ArrEmpty())->asBool(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfArrayableIsFalse(): void
    {
        Assert::assertThat(
            IsEmpty::new(new ArrayableOf([1, 2, 3]))->asBool(),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfStringIsTrue(): void
    {
        Assert::assertThat(
            IsEmpty::new("")->asBool(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfStringIsFalse(): void
    {
        Assert::assertThat(
            IsEmpty::new("Hello world!")->asBool(),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfTextIsTrue(): void
    {
        Assert::assertThat(
            IsEmpty::new(new TxtBlank())->asBool(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfTextIsFalse(): void
    {
        Assert::assertThat(
            IsEmpty::new(new TxtUpper("foo"))->asBool(),
            new IsFalse()
        );
    }
}

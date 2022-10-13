<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrEmpty;
use Maxonfjvipon\Elegant_Elephant\Boolean\IsEmpty;
use Maxonfjvipon\Elegant_Elephant\Text\TxtBlank;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;


final class IsEmptyTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfArrayIsTrue(): void
    {
        $this->assertScalarThat(
            IsEmpty([])->value(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfArrayIsFalse(): void
    {
        $this->assertScalarThat(
            IsEmpty([1, 2, 3])->value(),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfArrayableIsTrue(): void
    {
        $this->assertScalarThat(
            IsEmpty(new ArrEmpty())->value(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfArrayableIsFalse(): void
    {
        $this->assertScalarThat(
            IsEmpty(new ArrayableOf([1, 2, 3]))->value(),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfStringIsTrue(): void
    {
        $this->assertScalarThat(
            IsEmpty("")->value(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfStringIsFalse(): void
    {
        $this->assertScalarThat(
            IsEmpty("Hello world!")->value(),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfTextIsTrue(): void
    {
        $this->assertScalarThat(
            IsEmpty(new TxtBlank())->value(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEmptyOfTextIsFalse(): void
    {
        $this->assertScalarThat(
            IsEmpty(new TxtUpper("foo"))->value(),
            new IsFalse()
        );
    }
}

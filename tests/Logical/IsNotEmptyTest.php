<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrEmpty;
use Maxonfjvipon\Elegant_Elephant\Boolean\IsNotEmpty;
use Maxonfjvipon\Elegant_Elephant\Text\TxtBlank;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;


final class IsNotEmptyTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function isNotEmptyOfArrayIsTrue(): void
    {
        $this->assertScalarThat(
            IsNotEmpty([])->value(),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEmptyOfArrayIsFalse(): void
    {
        $this->assertScalarThat(
            IsNotEmpty([1, 2, 3])->value(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEmptyOfArrayableIsTrue(): void
    {
        $this->assertScalarThat(
            IsNotEmpty(new ArrEmpty())->value(),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEmptyOfArrayableIsFalse(): void
    {
        $this->assertScalarThat(
            IsNotEmpty(new ArrayableOf([1, 2, 3]))->value(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEmptyOfStringIsTrue(): void
    {
        $this->assertScalarThat(
            IsNotEmpty("")->value(),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEmptyOfStringIsFalse(): void
    {
        $this->assertScalarThat(
            IsNotEmpty("Hello world!")->value(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEmptyOfTextIsTrue(): void
    {
        $this->assertScalarThat(
            IsNotEmpty(new TxtBlank())->value(),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEmptyOfTextIsFalse(): void
    {
        $this->assertScalarThat(
            IsNotEmpty(new TxtUpper("foo"))->value(),
            new IsTrue()
        );
    }
}

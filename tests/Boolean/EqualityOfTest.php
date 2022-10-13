<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\FirstOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrReversed;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrValues;
use Maxonfjvipon\Elegant_Elephant\Boolean\EqualityOf;
use Maxonfjvipon\Elegant_Elephant\Number\SumOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TxtLowered;
use PHPUnit\Framework\Constraint\IsTrue;

final class EqualityOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function equalityOfInts(): void
    {
        $this->assertScalarThat(
            new EqualityOf(10, 10),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function equalityOfIntAndNumerable(): void
    {
        $this->assertScalarThat(
            new EqualityOf(42, new SumOf(40, 2)),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function equalityOfStringAndText(): void
    {
        $this->assertScalarThat(
            new EqualityOf("hey", new TxtLowered("Hey")),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function equalityOfArrayAndArrayable(): void
    {
        $this->assertScalarThat(
            new EqualityOf(new ArrValues(new ArrReversed(new ArrayableOf([3, 2, 1]))), [1, 2, 3]),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function equalityOfAnyAndText(): void
    {
        $this->assertScalarThat(
            new EqualityOf(new FirstOf(['foo', 'bar']), new TxtLowered("FOO")),
            new IsTrue()
        );
    }
}

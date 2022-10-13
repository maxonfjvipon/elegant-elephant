<?php

namespace Logical;

use Maxonfjvipon\Elegant_Elephant\Scalar\FirstOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrReversed;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrValues;
use Maxonfjvipon\Elegant_Elephant\Boolean\EqualityOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\SumOf;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtLowered;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsTrue;


final class EqualityOfTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws \Exception
     */
    public function equalityOfInts(): void
    {
        $this->assertScalarThat(
            EqualityOf(10, 10)->value(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws \Exception
     */
    public function equalityOfIntAndNumerable(): void
    {
        $this->assertScalarThat(
            EqualityOf(42, new SumOf(40, 2))->value(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws \Exception
     */
    public function equalityOfStringAndText(): void
    {
        $this->assertScalarThat(
            EqualityOf("hey", new TxtLowered("Hey"))->value(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws \Exception
     */
    public function equalityOfArrayAndArrayable(): void
    {
        $this->assertScalarThat(
            EqualityOf(new ArrValues(new ArrReversed(new ArrayableOf([3, 2, 1]))), [1, 2, 3])->value(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws \Exception
     */
    public function equalityOfAnyAndText(): void
    {
        $this->assertScalarThat(
            EqualityOf(new FirstOf(['foo', 'bar']), new TxtLowered("FOO"))->value(),
            new IsTrue()
        );
    }
}

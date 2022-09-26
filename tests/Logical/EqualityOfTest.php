<?php

namespace Logical;

use Maxonfjvipon\Elegant_Elephant\Any\FirstOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrReversed;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrValues;
use Maxonfjvipon\Elegant_Elephant\Logical\EqualityOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\SumOf;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtLowered;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsTrue;
use PHPUnit\Framework\TestCase;

final class EqualityOfTest extends TestCase
{
    /**
     * @test
     * @throws \Exception
     */
    public function equalityOfInts(): void
    {
        Assert::assertThat(
            EqualityOf::new(10, 10)->asBool(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws \Exception
     */
    public function equalityOfIntAndNumerable(): void
    {
        Assert::assertThat(
            EqualityOf::new(42, new SumOf(40, 2))->asBool(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws \Exception
     */
    public function equalityOfStringAndText(): void
    {
        Assert::assertThat(
            EqualityOf::new("hey", new TxtLowered("Hey"))->asBool(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws \Exception
     */
    public function equalityOfArrayAndArrayable(): void
    {
        Assert::assertThat(
            EqualityOf::new(new ArrValues(new ArrReversed(new ArrayableOf([3, 2, 1]))), [1, 2, 3])->asBool(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws \Exception
     */
    public function equalityOfAnyAndText(): void
    {
        Assert::assertThat(
            EqualityOf::new(new FirstOf(['foo', 'bar']), new TxtLowered("FOO"))->asBool(),
            new IsTrue()
        );
    }
}

<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Boolean;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\FirstOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrReversed;
use Maxonfjvipon\ElegantElephant\Arr\ArrValues;
use Maxonfjvipon\ElegantElephant\Logic\IsEqual;
use Maxonfjvipon\ElegantElephant\Num\SumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtLowered;
use PHPUnit\Framework\Constraint\IsTrue;

final class EqualityOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function equalityOfInts(): void
    {
        $this->assertMixedCastThat(
            new IsEqual(10, 10),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function equalityOfIntAndNumerable(): void
    {
        $this->assertMixedCastThat(
            new IsEqual(42, new SumOf(40, 2)),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function equalityOfStringAndText(): void
    {
        $this->assertMixedCastThat(
            new IsEqual("hey", new TxtLowered("Hey")),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function equalityOfArrayAndArrayable(): void
    {
        $this->assertMixedCastThat(
            new IsEqual(new ArrValues(new ArrReversed(new ArrOf([3, 2, 1]))), [1, 2, 3]),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function equalityOfAnyAndText(): void
    {
        $this->assertMixedCastThat(
            new IsEqual(new FirstOf(['foo', 'bar']), new TxtLowered("FOO")),
            new IsTrue()
        );
    }
}

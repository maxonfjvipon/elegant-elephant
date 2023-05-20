<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Tests\Any;

use Exception;
use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Any\AnyFork;
use Maxonfjvipon\ElegantElephant\Any\AnyOf;
use Maxonfjvipon\ElegantElephant\Any\Reduced;
use Maxonfjvipon\ElegantElephant\Logic\Conj;
use Maxonfjvipon\ElegantElephant\Logic\Disj;
use Maxonfjvipon\ElegantElephant\Logic\IsNotNull;
use Maxonfjvipon\ElegantElephant\Num;
use Maxonfjvipon\ElegantElephant\Num\NumFork;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Num\SumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\Constraint\IsNull;

final class ReducedTest extends TestCase
{
    /**
     * @return void
     * @throws Exception
     */
    public function test_reduced_to_number(): void
    {
        $this->assertAnyThat(
            new Reduced(
                [1, 2, 3, 4],
                fn (Num $acc, int $item) => SumOf::items($acc, $item),
                NumOf::number(10)
            ),
            new IsEqual(20)
        );
    }

    /**
     * @return void
     * @throws Exception
     */
    public function test_reduced_to_number_with_ensuring(): void
    {
        $this->assertAnyThat(
            new Reduced(
                [1, 2, 3, 4],
                fn (int $acc, int $item) => $acc + $item,
                NumOf::number(10),
                ensureInit: true
            ),
            new IsEqual(20)
        );
    }

    /**
     * @return void
     * @throws Exception
     */
    public function test_reduced_with_condition(): void
    {
        $this->assertAnyThat(
            new Reduced(
                [1, 2, null, 3],
                fn (Any $acc, int|null $item) => new AnyFork(
                    condition: new Conj(
                        new IsNotNull($item),
                        new IsNotNull($acc)
                    ),
                    first: NumOf::func(
                        fn () => SumOf::items(NumOf::any($acc), $item) /** @phpstan-ignore-line */
                    ),
                    second: null
                ),
                AnyOf::num(0)
            ),
            new IsNull()
        );
    }
}

<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Number;

use Exception;
use Maxonfjvipon\ElegantElephant\Num;
use Maxonfjvipon\ElegantElephant\Num\NumSticky;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class NumStickyTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function doesNotChangeValue(): void
    {
        $num = 2;
        $cached = new NumSticky(
            new class ($num) implements Num {
                /** @var int $num */
                private int $num;

                /**
                 * Ctor.
                 *
                 * @param int $num
                 */
                final public function __construct(int $num)
                {
                    $this->num = $num;
                }

                /**
                 * @return int
                 */
                public function asNumber(): int
                {
                    $this->num += 2;
                    return $this->num;
                }
            }
        );
        $cached->asNumber();

        $this->assertMixedCastThat(
            $cached,
            new IsEqual(4)
        );
    }
}

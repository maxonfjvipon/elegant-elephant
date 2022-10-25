<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Num;

use Exception;
use Maxonfjvipon\ElegantElephant\Num;
use Maxonfjvipon\ElegantElephant\Num\NumSticky;
use Maxonfjvipon\ElegantElephant\Tests\IsNum;
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
        $this->assertNumThat(
            $cached = new NumSticky(
                new class (2) implements Num {
                    /**
                     * Ctor.
                     * @param int $num
                     */
                    final public function __construct(private int $num)
                    {
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
            ),
            new IsNum($cached)
        );
    }
}

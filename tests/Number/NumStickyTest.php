<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Number;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Number\NumSticky;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
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
            new class ($num) implements Number {
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

<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumSticky;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

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
            new class ($num) implements Numerable {
                private int $num;

                public function __construct(int $num)
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
        $result = $cached->asNumber();

        Assert::assertThat(
            $result,
            new IsEqual(4)
        );
    }
}

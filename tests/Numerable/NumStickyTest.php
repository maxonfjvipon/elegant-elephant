<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumSticky;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class NumStickyTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
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
                private int $num;

                public function __construct(int $num)
                {
                    $this->num = $num;
                }

                /**
                 * @return int
                 */
                public function value(): int
                {
                    $this->num += 2;
                    return $this->num;
                }
            }
        );
        $cached->value();
        $result = $cached->value();

        $this->assertScalarThat(
            $result,
            new IsEqual(4)
        );
    }
}

<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Arr\ArrSticky;
use Maxonfjvipon\ElegantElephant\Arr\CountArr;
use Maxonfjvipon\ElegantElephant\Arr\HasArrIterator;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrStickyTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function cacheWorks(): void
    {
        $num = 2;
        $arr = new ArrSticky(
            new class($num) implements Arr {
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
                 * @return array<int>
                 */
                public function asArray(): array
                {
                    $this->num = $this->num + 2; // BIG calculations :)
                    return [$this->num];
                }
            }
        );
        $arr->asArray();
        $this->assertMixedCastThat(
            $arr,
            new IsEqual([4]) // no recalculation
        );
    }
}

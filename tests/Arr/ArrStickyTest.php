<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Arr\ArrSticky;
use Maxonfjvipon\ElegantElephant\Tests\Support\IsArr;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;

final class ArrStickyTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function cacheWorks(): void
    {
        $this->assertArrThat(
            $arr = new ArrSticky(
                new class(2) implements Arr {
                    /**
                     * Ctor.
                     * @param int $num
                     */
                    final public function __construct(private int $num)
                    {
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
            ),
            new IsArr($arr)
        );
    }
}

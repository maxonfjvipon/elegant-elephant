<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrSticky;
use Maxonfjvipon\Elegant_Elephant\Arrayable\CountArrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\HasArrayableIterator;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
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
            new class($num) implements Arrayable {
                use CountArrayable;
                use HasArrayableIterator;

                /** @var int $num */
                private int $num;

                /**
                 * Ctor.
                 *
                 * @param int $num
                 */
                public function __construct(int $num)
                {
                    $this->num = $num;
                }

                /**
                 * @return array<int>
                 */
                public function value(): array
                {
                    $this->num = $this->num + 2; // BIG calculations :)
                    return [$this->num];
                }
            }
        );
        $arr->value();
        $this->assertScalarThat(
            $arr,
            new IsEqual([4]) // no recalculation
        );
    }
}

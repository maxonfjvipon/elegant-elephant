<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\AbstractArrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrSticky;
use Maxonfjvipon\Elegant_Elephant\Arrayable\HasArrIterator;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

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
            new class($num) extends AbstractArrayable {
                private int $num;

                public function __construct(int $num)
                {
                    $this->num = $num;
                }

                public function asArray(): array
                {
                    $this->num = $this->num + 2; // BIG calculations :)
                    return [$this->num];
                }
            }
        );
        $arr->asArray();
        Assert::assertThat(
            $arr->asArray(),
            new IsEqual([4]) // no recalculation
        );
    }
}

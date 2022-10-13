<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\AbstractArrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrSticky;
use Maxonfjvipon\Elegant_Elephant\Arrayable\HasArrayableIterator;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class ArrStickyTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
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

                public function value(): array
                {
                    $this->num = $this->num + 2; // BIG calculations :)
                    return [$this->num];
                }
            }
        );
        $arr->value();
        $this->assertScalarThat(
            $arr->value(),
            new IsEqual([4]) // no recalculation
        );
    }
}

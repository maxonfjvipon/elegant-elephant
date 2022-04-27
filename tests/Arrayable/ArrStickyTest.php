<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use ArrayIterator;
use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrEnvelope;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrSticky;
use Maxonfjvipon\Elegant_Elephant\Arrayable\HasArrIterator;
use PHPUnit\Framework\TestCase;
use Traversable;

class ArrStickyTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray()
    {
        $num = 2;
        $arr = new ArrSticky(
            new class($num) implements Arrayable {
                use HasArrIterator;

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
        $this->assertEquals([4], $arr->asArray());
        $this->assertEquals([4], $arr->asArray()); // no calculations again
    }
}
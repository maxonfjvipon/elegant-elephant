<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrIf;
use Maxonfjvipon\Elegant_Elephant\Logical\Untruth;
use PHPUnit\Framework\TestCase;

class ArrIfTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray()
    {
        $this->assertEquals(
            [1, 2, 3],
            (new ArrIf(
                true,
                [1, 2, 3]
            ))->asArray()
        );
        $this->assertEquals(
            [],
            (new ArrIf(
                new Untruth(),
                [1, 2, 3]
            ))->asArray()
        );
        $this->assertEquals(
            [1, 2],
            (new ArrIf(
                true,
                fn() => [1, 2]
            ))->asArray()
        );
    }
}
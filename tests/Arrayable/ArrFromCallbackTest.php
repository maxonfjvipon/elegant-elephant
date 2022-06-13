<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrFromCallback;
use PHPUnit\Framework\TestCase;

class ArrFromCallbackTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray()
    {
        $this->assertEquals(
            [1, 2, 3],
            (new ArrFromCallback(fn() => [1, 2, 3]))->asArray()
        );
    }
}
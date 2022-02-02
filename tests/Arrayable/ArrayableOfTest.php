<?php


namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use PHPUnit\Framework\TestCase;

class ArrayableOfTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray()
    {
        $arr = [1, 2, "hello"];
        $this->assertEquals(
            $arr,
            ArrayableOf::items(...$arr)->asArray()
        );
        $this->assertEquals(
            $arr,
            (new ArrayableOf([1, 2, "hello"]))->asArray()
        );
        $this->assertNotEquals(
            $arr,
            ArrayableOf::items(1, 2, 3)->asArray()
        );
    }
}

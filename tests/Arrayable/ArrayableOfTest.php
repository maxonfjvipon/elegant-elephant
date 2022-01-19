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
            ArrayableOf::array($arr)->asArray()
        );
        $this->assertEquals(
            $arr,
            ArrayableOf::items(1, 2, "hello")->asArray()
        );
        $this->assertNotEquals(
            $arr,
            ArrayableOf::array([1, 2, 3])->asArray()
        );
    }
}

<?php


namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;


use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMerged;
use PHPUnit\Framework\TestCase;

class ArrMergedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $arr = [1, 2, "hello", "world"];
        $this->assertEquals(
            $arr,
            (new ArrMerged([1, 2], ["hello", "world"]))->asArray()
        );
        $this->assertEquals(
            $arr,
            ArrMerged::new(ArrayableOf::array([1, 2]), ["hello", "world"])->asArray()
        );
        $this->assertNotEquals(
            $arr,
            ArrMerged::new([1, 2], ArrayableOf::items(1, 2))->asArray()
        );
        $this->assertEquals(
            $arr,
            ArrMerged::new(ArrayableOf::array($arr), [], [])->asArray()
        );
    }
}
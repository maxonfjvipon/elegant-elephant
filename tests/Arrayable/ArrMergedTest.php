<?php


namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;


use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMapped;
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
            ArrMerged::new(ArrayableOf::new([1, 2]), ["hello", "world"])->asArray()
        );
        $this->assertEquals(
            $arr,
            ArrMerged::new(ArrayableOf::new($arr), [], [])->asArray()
        );
        $this->assertEquals(
            [2, 3, 3, 4, 4, 5],
            (new ArrMerged(
                ...new ArrMapped(
                    new ArrayableOf([1, 2, 3]),
                    fn($num) => [$num + 1, $num + 2]
                )
            ))->asArray()
        );
        $this->assertEquals(
            ["1A", "1B", "2A", "2B"],
            (new ArrMerged(
                ...new ArrMapped(
                    [1, 2],
                    fn($num) => new ArrMapped(
                        ["A", "B"],
                        fn($sym) => "$num$sym"
                    )
                )
            ))->asArray()
        );
    }
}
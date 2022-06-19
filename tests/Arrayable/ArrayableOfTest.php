<?php


namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Logical\Truth;
use Maxonfjvipon\Elegant_Elephant\Logical\Untruth;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumerableOf;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\TestCase;

class ArrayableOfTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray()
    {
        $this->assertEquals(
            [
                'key1' => 1,
                'key2' => 2,
                'key3' => "Hello",
                'key4' => "World",
                'key5' => [2, 3],
                'key6' => [3, 2],
                null,
                true,
                false,
            ],
            ArrayableOf::new([
                'key1' => 1,
                'key2' => new NumerableOf(2),
                'key3' => "Hello",
                'key4' => new TextOf("World"),
                'key5' => [2, 3],
                'key6' => new ArrayableOf([3, 2]),
                null,
                true,
                new Untruth()
            ])->asArray()
        );
    }
}

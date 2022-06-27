<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any\FirstOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMerged;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrObject;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrReversed;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumerableOf;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\TestCase;

class ArrObjectTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function testAsArray()
    {
        $this->assertEquals(
            [
                'key1' => ["foo", "bar"],
                'key2' => ['bar', "foo"]
            ],
            ArrMerged::new(
                ArrObject::new("key1", ArrayableOf::new(["foo", "bar"], false)),
                ArrObject::new("key2", ArrReversed::new(["foo", "bar"]))
            )->asArray()
        );
        $this->assertEquals(
            [
                'key1' => [1, 2],
                'key2' => 'str',
                'key3' => ['foo', 'bar'],
                'key4' => "Hello",
                'key5' => 1,
                'key6' => 5,
                'key7' => 8
            ],
            ArrMerged::new(
                new ArrObject('key1', [1, 2]),
                new ArrObject('key2', "str"),
                new ArrObject('key3', new ArrayableOf(['foo', 'bar'], false)),
                new ArrObject('key4', new TextOf("Hello")),
                new ArrObject('key5', new FirstOf([1, 2])),
                new ArrObject('key6', new NumerableOf(5)),
                new ArrObject('key7', 8)
            )->asArray()
        );
    }
}
<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMerged;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrObject;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrReversed;
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
    }
}
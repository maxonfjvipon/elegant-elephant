<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMappedKeyValue;
use PHPUnit\Framework\TestCase;

class ArrMappedKeyValueTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray()
    {
        $this->assertEquals(
            [
                'foo' => 'foo1',
                'bar' => 'bar2',
                'baz' => 'baz3',
            ],
            (new ArrMappedKeyValue([
                'foo' => 1,
                'bar' => 2,
                'baz' => 3
            ], fn($key, $value) => $key . $value))->asArray()
        );
    }
}
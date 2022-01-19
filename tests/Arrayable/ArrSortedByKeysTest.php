<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrSortedByKeys;
use PHPUnit\Framework\TestCase;

class ArrSortedByKeysTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $expected = [
            0 => "hello",
            1 => "world",
            2 => "dear",
            3 => "friend"
        ];
        $arr = [
            1 => "world",
            0 => "hello",
            3 => "friend",
            2 => "dear"
        ];

        $this->assertEquals(
            $expected,
            ArrSortedByKeys::ofArray($arr)->asArray()
        );
        $this->assertEquals(
            $expected,
            ArrSortedByKeys::ofArrayable(ArrayableOf::array($arr))->asArray()
        );
        $this->assertEquals(
            $expected,
            ArrSortedByKeys::ofArray($expected)->asArray()
        );
    }
}
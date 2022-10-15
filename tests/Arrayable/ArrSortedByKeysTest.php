<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrSortedByKeys;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrSortedByKeysTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function sortedByKeysWorks(): void
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
        $this->assertMixedCastThat(
            new ArrSortedByKeys($arr),
            new IsEqual($expected)
        );
    }
}

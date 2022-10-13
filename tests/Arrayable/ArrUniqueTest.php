<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrUnique;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrValues;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrUniqueTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function uniqueWorks(): void
    {
        $this->assertScalarThat(
            new ArrValues(new ArrUnique([1, 1, 2, 3, 4, 5, 5])),
            new IsEqual([1, 2, 3, 4, 5])
        );
    }
}

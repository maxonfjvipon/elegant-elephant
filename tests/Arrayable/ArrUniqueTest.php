<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrUnique;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrValues;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class ArrUniqueTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function uniqueWorks(): void
    {
        Assert::assertThat(
            ArrValues::new(ArrUnique::new([1, 1, 2, 3, 4, 5, 5]))->asArray(),
            new IsEqual([1, 2, 3, 4, 5])
        );
    }
}

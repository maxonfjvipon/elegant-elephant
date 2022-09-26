<?php

namespace Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrEmpty;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEmpty;
use PHPUnit\Framework\TestCase;

final class ArrEmptyTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function emptyWorks(): void
    {
        Assert::assertThat(
            new ArrEmpty(),
            new IsEmpty()
        );
    }
}

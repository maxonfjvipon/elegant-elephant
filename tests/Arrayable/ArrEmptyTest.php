<?php

namespace Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrEmpty;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEmpty;


final class ArrEmptyTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @return void
     */
    public function emptyWorks(): void
    {
        $this->assertScalarThat(
            new ArrEmpty(),
            new IsEmpty()
        );
    }
}

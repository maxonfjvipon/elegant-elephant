<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrEmpty;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEmpty;

final class ArrEmptyTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function emptyWorks(): void
    {
        $this->assertScalarThat(
            new ArrEmpty(),
            new IsEmpty()
        );
    }
}

<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrEmpty;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
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
        $this->assertArrThat(
            new ArrEmpty(),
            new IsEmpty()
        );
    }
}

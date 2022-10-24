<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arrayable;

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
        $this->assertMixedCastThat(
            new ArrEmpty(),
            new IsEmpty()
        );
    }
}

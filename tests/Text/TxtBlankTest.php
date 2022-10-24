<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Text;

use Exception;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtBlank;
use PHPUnit\Framework\Constraint\IsEmpty;

final class TxtBlankTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function textBlankIsEmpty(): void
    {
        $this->assertMixedCastThat(
            new TxtBlank(),
            new IsEmpty()
        );
    }
}

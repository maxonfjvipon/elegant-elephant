<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TxtBlank;
use PHPUnit\Framework\Constraint\IsEmpty;

final class TxtBlankTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function textBlankIsEmpty(): void
    {
        $this->assertScalarThat(
            new TxtBlank(),
            new IsEmpty()
        );
    }
}

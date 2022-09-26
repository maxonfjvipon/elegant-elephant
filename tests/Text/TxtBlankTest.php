<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TxtBlank;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEmpty;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class TxtBlankTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function textBlankIsEmpty(): void
    {
        Assert::assertThat(
            TxtBlank::new()->asString(),
            new IsEmpty()
        );
    }
}

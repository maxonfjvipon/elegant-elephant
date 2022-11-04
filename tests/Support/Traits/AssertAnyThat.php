<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Support\Traits;

use Exception;
use Maxonfjvipon\ElegantElephant\Any;
use PHPUnit\Framework\Constraint\Constraint;

trait AssertAnyThat
{
    /**
     * @param Any $any
     * @param Constraint $constraint
     * @param string $message
     * @return void
     * @throws Exception
     */
    protected function assertAnyThat(Any $any, Constraint $constraint, string $message = ''): void
    {
        $this->assertThat($any->value(), $constraint, $message);
    }
}

<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Support\Traits;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic;
use PHPUnit\Framework\Constraint\Constraint;

trait AssertLogicThat
{
    /**
     * @param Logic $logic
     * @param Constraint $constraint
     * @param string $message
     * @return void
     * @throws Exception
     */
    protected function assertLogicThat(Logic $logic, Constraint $constraint, string $message = ''): void
    {
        $this->assertThat($logic->asBool(), $constraint, $message);
    }
}

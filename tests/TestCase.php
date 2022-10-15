<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Tests;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;
use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * Test case.
 */
class TestCase extends BaseTestCase
{
    use CastMixed;

    /**
     * @param mixed $mixed
     * @param Constraint $constraint
     * @param string $message
     * @return void
     * @throws Exception
     */
    protected function assertScalarThat($mixed, Constraint $constraint, string $message = ''): void
    {
        $this->assertThat(
            $this->mixedCast($mixed),
            $constraint,
            $message
        );
    }
}

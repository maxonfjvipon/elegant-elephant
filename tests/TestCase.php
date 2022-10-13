<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Tests;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar;
use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * Test case.
 */
class TestCase extends BaseTestCase
{
    /**
     * @param Scalar $scalar
     * @param Constraint $constraint
     * @param string $message
     * @return void
     * @throws Exception
     */
    protected function assertScalarThat(Scalar $scalar, Constraint $constraint, string $message = ''): void
    {
        $this->assertThat(
            $scalar->value(),
            $constraint,
            $message
        );
    }
}

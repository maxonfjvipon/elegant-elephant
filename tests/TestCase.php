<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests;
use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar;
use Maxonfjvipon\Elegant_Elephant\Text;
use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * Test case.
 */
class TestCase extends BaseTestCase
{
    /**
     * @param Arrayable|Text|Number|Boolean|Scalar $scalar
     * @param Constraint $constraint
     * @param string $message
     * @return void
     * @throws Exception
     */
    protected function assertScalarThat($scalar, Constraint $constraint, string $message = ''): void
    {
        $this->assertThat(
            $scalar->value(),
            $constraint,
            $message
        );
    }
}

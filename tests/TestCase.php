<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Tests;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\CastMixed;
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
    protected function assertMixedCastThat($mixed, Constraint $constraint, string $message = ''): void
    {
        $this->assertThat(
            $this->mixedCast($mixed),
            $constraint,
            $message
        );
    }
}

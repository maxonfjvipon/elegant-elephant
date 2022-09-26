<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable cast.
 */
trait CastArrayable
{
    /**
     * @param array<mixed>|Arrayable ...$args
     * @return array<array<mixed>>
     * @throws Exception
     */
    private function arrayablesCast(...$args): array
    {
        return array_map(
            fn ($arg) => $this->arrayableCast($arg),
            $args
        );
    }

    /**
     * @param array<mixed>|callable|Arrayable $arg
     * @return array<mixed>
     * @throws Exception
     */
    private function arrayableOrCallableCast($arg): array
    {
        if (is_callable($arg)) {
            return $this->arrayableOrCallableCast(call_user_func($arg));
        }

        return $this->arrayableCast($arg);
    }

    /**
     * @param array<mixed>|Arrayable $arg
     * @return array<mixed>
     * @throws Exception
     */
    private function arrayableCast($arg): array
    {
        return is_array($arg) ? $arg : $arg->asArray();
    }
}

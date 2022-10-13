<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Scalar;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar;

/**
 * Cast scalar.
 */
trait CastScalar
{
    /**
     * @param mixed $mixed
     * @return mixed
     * @throws Exception
     */
    private function scalarCast($mixed)
    {
        if ($mixed instanceof Scalar) {
            return $mixed->value();
        }

        return $mixed;
    }

    /**
     * @param mixed $scalar
     * @return mixed
     * @throws Exception
     */
    private function scalarOrCallableCast($scalar)
    {
        if (is_callable($scalar)) {
            return $this->scalarOrCallableCast(call_user_func($scalar));
        }

        return $this->scalarCast($scalar);
    }


    /**
     * @param mixed ...$scalars
     * @return array<mixed>
     * @throws Exception
     */
    private function scalarsCast(...$scalars): array
    {
        return array_map(
            fn ($scalar) => $this->scalarCast($scalar),
            $scalars
        );
    }
}

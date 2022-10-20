<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Scalar;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar;
use Maxonfjvipon\Elegant_Elephant\Text;
use Stringable;

/**
 * Cast mixed.
 */
trait CastMixed
{
    /**
     * @param mixed $mixed
     * @return mixed
     * @throws Exception
     */
    final private function mixedCast($mixed)
    {
        if ($mixed instanceof Scalar) {
            return $mixed->value();
        }

        if ($mixed instanceof Arrayable) {
            return $mixed->asArray();
        }

        if ($mixed instanceof Text) {
            return $mixed->asString();
        }

        if ($mixed instanceof Stringable) {
            return $mixed->__toString();
        }

        if ($mixed instanceof Number) {
            return $mixed->asNumber();
        }

        if ($mixed instanceof Boolean) {
            return $mixed->asBool();
        }

        return $mixed;
    }

    /**
     * @param mixed $mixed
     * @param mixed ...$args
     * @return mixed
     * @throws Exception
     */
    final private function mixedOrCallableCast($mixed, ...$args)
    {
        if (is_callable($mixed)) {
            return $this->mixedOrCallableCast(call_user_func($mixed, ...$args));
        }

        return $this->mixedCast($mixed);
    }


    /**
     * @param mixed ...$mixedArr
     * @return array<mixed>
     * @throws Exception
     */
    final private function mixedArrCast(...$mixedArr): array
    {
        return array_map(
            fn ($mixed) => $this->mixedCast($mixed),
            $mixedArr
        );
    }
}

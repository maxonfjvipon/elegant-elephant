<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant;

use Exception;

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
    private function castMixed($mixed)
    {
        if ($mixed instanceof Arrayable) {
            return $mixed->asArray();
        }

        if ($mixed instanceof Numerable) {
            return $mixed->asNumber();
        }

        if ($mixed instanceof Text) {
            return $mixed->asString();
        }

        if ($mixed instanceof Logical) {
            return $mixed->asBool();
        }

        if ($mixed instanceof Any) {
            return $mixed->asAny();
        }

        return $mixed;
    }
}

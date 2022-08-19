<?php

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
    private function castMixed(mixed $mixed): mixed
    {
        if ($mixed instanceof Arrayable) {
            return $mixed->asArray();
        } elseif ($mixed instanceof Numerable) {
            return $mixed->asNumber();
        } elseif ($mixed instanceof Text) {
            return $mixed->asString();
        } elseif ($mixed instanceof Logical) {
            return $mixed->asBool();
        } elseif ($mixed instanceof Any) {
            return $mixed->asAny();
        } else {
            return $mixed;
        }
    }
}
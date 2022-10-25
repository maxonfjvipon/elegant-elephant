<?php

namespace Maxonfjvipon\ElegantElephant\Any;

use Exception;
use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Logic;
use Maxonfjvipon\ElegantElephant\Num;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Ensure Any.
 */
trait EnsureAny
{
    /**
     * @param mixed $any
     * @return mixed
     * @throws Exception
     */
    private function ensuredAnyValue(mixed $any): mixed
    {
        $getAny = function (mixed $any): Any {
            if ($any instanceof Any) {
                return $any;
            }

            if ($any instanceof Arr) {
                return AnyOf::arr($any);
            }

            if ($any instanceof Txt) {
                return AnyOf::text($any);
            }

            if ($any instanceof Num) {
                return AnyOf::num($any);
            }

            if ($any instanceof Logic) {
                return AnyOf::logic($any);
            }

            return AnyOf::func(fn () => $any);
        };

        return $getAny($any)->value();
    }
}

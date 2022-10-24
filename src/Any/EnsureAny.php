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
     * @param  mixed $any
     * @return Any
     * @throws Exception
     */
    final private function ensuredAny($any): Any
    {
        if ($any instanceof Any) :
            return $any;
        endif;

        if (is_array($any) || $any instanceof Arr) {
            return AnyOf::arr($any);
        }

        if (is_string($any) || $any instanceof Txt) {
            return AnyOf::text($any);
        }

        if (is_float($any) || is_int($any) || $any instanceof Num) {
            return AnyOf::num($any);
        }

        if (is_bool($any) || $any instanceof Logic) {
            return AnyOf::logic($any);
        }

        return AnyOf::func(fn () => $any);
    }
}

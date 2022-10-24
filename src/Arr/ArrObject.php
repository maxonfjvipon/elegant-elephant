<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Any\EnsureAny;
use Maxonfjvipon\ElegantElephant\Num;
use Maxonfjvipon\ElegantElephant\Num\EnsureNum;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Array as object.
 */
final class ArrObject extends ArrWrap
{
    use EnsureNum;
    use EnsureAny;

    /**
     * Ctor.
     *
     * @param string|int|float|Txt|Num|Any $key
     * @param mixed                        $object
     */
    final public function __construct($key, $object)
    {
        parent::__construct(
            ArrOf::func(fn () => [$this->ensuredAny($key)->value() => $this->ensuredAny($object)->value()])
        );
    }
}

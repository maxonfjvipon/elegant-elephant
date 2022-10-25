<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Logic;

use Maxonfjvipon\ElegantElephant\Any\EnsureAny;
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Arr\EnsureArr;

/**
 * In array.
 */
final class InArray extends LogicWrap
{
    use EnsureAny;
    use EnsureArr;

    /**
     * Ctor.
     *
     * @param mixed            $needle
     * @param array<mixed>|Arr $arr
     * @param bool             $strict
     */
    final public function __construct(mixed $needle, array|Arr $arr, bool $strict = false)
    {
        parent::__construct(
            LogicOf::func(
                fn () => in_array(
                    $this->ensuredAnyValue($needle),
                    $this->ensuredArray($arr),
                    $strict
                )
            )
        );
    }
}

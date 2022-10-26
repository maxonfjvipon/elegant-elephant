<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Maxonfjvipon\ElegantElephant\Any\EnsureAny;
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Logic\IsNull;
use Maxonfjvipon\ElegantElephant\Logic\Not;

/**
 * Arr with an element.
 */
final class ArrWith extends ArrWrap
{
    use EnsureArr;
    use EnsureAny;

    /**
     * Ctor.
     * @param array<mixed>|Arr $arr
     * @param mixed $keyOrValue
     * @param mixed|null $value
     */
    final public function __construct(array|Arr $arr, mixed $keyOrValue, mixed $value = null)
    {
        parent::__construct(
            new ArrMerged(
                $arr,
                new ArrCond(
                    new IsNull($value),
                    ArrOf::func(fn () => [$this->ensuredAnyValue($keyOrValue)]),
                    new ArrObject($keyOrValue, $value)
                )
            )
        );
    }
}

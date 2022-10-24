<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Logic\IsNull;
use Maxonfjvipon\ElegantElephant\Logic\Not;

/**
 * Arr with an element.
 */
final class ArrWith extends ArrWrap
{
    use EnsureArr;

    /**
     * @param array<mixed>|Arr $arr
     * @param mixed            $keyOrValue
     * @param mixed|null       $value
     */
    final public function __construct($arr, $keyOrValue, $value = null)
    {
        parent::__construct(
            new ArrMerged(
                $arr,
                new ArrCond(
                    new Not(new IsNull($value)),
                    new ArrObject($keyOrValue, $value),
                    ArrOf::func(fn () => [$this->ensuredArr($keyOrValue)->asArray()])
                )
            )
        );
    }
}

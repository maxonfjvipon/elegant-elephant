<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Maxonfjvipon\ElegantElephant\Any\AnyOf;
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Logic;
use Maxonfjvipon\ElegantElephant\Any\AnyCond;

/**
 * Conditional array.
 */
final class ArrCond extends ArrWrap
{
    /**
     * Ctor.
     *
     * @param bool|Logic       $condition
     * @param Arr|array<mixed> $first
     * @param array<mixed>|Arr $second
     */
    final public function __construct(bool|Logic $condition, array|Arr $first, array|Arr $second)
    {
        parent::__construct(
            ArrOf::any(
                new AnyCond(
                    $condition,
                    AnyOf::arr($first),
                    AnyOf::arr($second)
                )
            )
        );
    }
}

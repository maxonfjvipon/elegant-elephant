<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Logic;

use Maxonfjvipon\ElegantElephant\Any\AnyCond;
use Maxonfjvipon\ElegantElephant\Any\AnyOf;
use Maxonfjvipon\ElegantElephant\Logic;

/**
 * Conditional logic.
 */
final class LogicCond extends LogicWrap
{
    /**
     * @param bool|Logic $condition
     * @param bool|Logic $first
     * @param bool|Logic $second
     */
    final public function __construct(bool|Logic $condition, bool|Logic $first, bool|Logic $second)
    {
        parent::__construct(
            LogicOf::any(
                new AnyCond(
                    $condition,
                    AnyOf::logic($first),
                    AnyOf::logic($second)
                )
            )
        );
    }
}

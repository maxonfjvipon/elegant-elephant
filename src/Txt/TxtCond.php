<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Txt;

use Maxonfjvipon\ElegantElephant\Any\AnyCond;
use Maxonfjvipon\ElegantElephant\Any\AnyOf;
use Maxonfjvipon\ElegantElephant\Logic;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Conditional text.
 */
final class TxtCond extends TxtWrap
{
    /**
     * Ctor.
     *
     * @param bool|Logic $condition
     * @param string|Txt $first
     * @param string|Txt $second
     */
    final public function __construct($condition, $first, $second)
    {
        parent::__construct(
            TxtOf::any(
                new AnyCond(
                    $condition,
                    AnyOf::text($first),
                    AnyOf::text($second),
                )
            )
        );
    }
}

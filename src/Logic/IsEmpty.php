<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Logic;

use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Num\LengthOf;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Is empty.
 */
final class IsEmpty extends LogicWrap
{
    /**
     * Ctor.
     *
     * @param string|array<mixed>|Arr|Txt $value
     */
    final public function __construct($value)
    {
        parent::__construct(
            new IsEqual(
                new LengthOf($value),
                0
            )
        );
    }
}

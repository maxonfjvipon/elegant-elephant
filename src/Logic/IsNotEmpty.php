<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Logic;

use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Is not empty.
 */
final class IsNotEmpty extends LogicWrap
{
    /**
     * Ctor.
     *
     * @param string|array<mixed>|Arr|Txt $value
     */
    final public function __construct($value)
    {
        parent::__construct(
            new Not(
                new IsEmpty($value)
            )
        );
    }
}

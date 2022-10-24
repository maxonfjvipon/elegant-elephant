<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

/**
 * Empty array.
 */
final class ArrEmpty extends ArrWrap
{
    /**
     * Ctor.
     */
    final public function __construct()
    {
        parent::__construct(
            ArrOf::array([])
        );
    }
}

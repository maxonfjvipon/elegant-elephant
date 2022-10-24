<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Maxonfjvipon\ElegantElephant\Any\EnsureAny;
use Maxonfjvipon\ElegantElephant\Arr;

/**
 * Array cast.
 */
final class ArrCast extends ArrWrap
{
    use EnsureAny;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arr $arr
     */
    final public function __construct($arr)
    {
        parent::__construct(
            new ArrMapped(
                $arr,
                fn ($value) => $this->ensuredAny($value)->value()
            )
        );
    }
}

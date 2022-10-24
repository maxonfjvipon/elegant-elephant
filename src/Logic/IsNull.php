<?php

namespace Maxonfjvipon\ElegantElephant\Logic;

use Maxonfjvipon\ElegantElephant\Any\EnsureAny;

/**
 * Check is null.
 */
final class IsNull extends LogicWrap
{
    use EnsureAny;

    /**
     * Ctor.
     *
     * @param mixed $value
     */
    final public function __construct($value)
    {
        parent::__construct(
            LogicOf::func(fn () => $this->ensuredAny($value)->value() != null)
        );
    }
}

<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Logic;

use Maxonfjvipon\ElegantElephant\Any\EnsureAny;

/**
 * Is equal.
 */
final class IsEqual extends LogicWrap
{
    use EnsureAny;

    /**
     * Ctor.
     *
     * @param mixed $arg1
     * @param mixed $arg2
     */
    final public function __construct($arg1, $arg2)
    {
        parent::__construct(
            LogicOf::func(fn () => $this->ensuredAny($arg1)->value() === $this->ensuredAny($arg2)->value())
        );
    }
}

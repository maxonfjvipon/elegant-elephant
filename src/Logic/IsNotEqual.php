<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Logic;

/**
 * Is not equal.
 */
final class IsNotEqual extends LogicWrap
{
    /**
     * Ctor.
     *
     * @param mixed $arg1
     * @param mixed $arg2
     */
    final public function __construct(mixed $arg1, mixed $arg2)
    {
        parent::__construct(
            new Not(new IsEqual($arg1, $arg2))
        );
    }
}

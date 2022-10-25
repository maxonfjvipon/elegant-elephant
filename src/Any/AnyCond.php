<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Any;

use Maxonfjvipon\ElegantElephant\Logic\EnsureLogic;
use Maxonfjvipon\ElegantElephant\Logic;

/**
 * Conditional Any.
 */
final class AnyCond extends AnyWrap
{
    use EnsureLogic;
    use EnsureAny;

    /**
     * Ctor.
     *
     * @param bool|Logic $condition
     * @param mixed $first
     * @param mixed $second
     */
    final public function __construct(bool|Logic $condition, mixed $first, mixed $second)
    {
        parent::__construct(
            AnyOf::func(
                fn () => $this->ensuredBool($condition)
                ? $this->ensuredAnyValue($first)
                : $this->ensuredAnyValue($second)
            )
        );
    }
}

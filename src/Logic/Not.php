<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Logic;

use Maxonfjvipon\ElegantElephant\Logic;

/**
 * Not.
 */
final class Not extends LogicWrap
{
    use EnsureLogic;

    /**
     * Ctor.
     *
     * @param bool|Logic $boolOrLogic
     */
    final public function __construct(bool|Logic $boolOrLogic)
    {
        parent::__construct(
            LogicOf::func(fn () => !$this->ensuredBool($boolOrLogic))
        );
    }
}

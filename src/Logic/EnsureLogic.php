<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Logic;

use Maxonfjvipon\ElegantElephant\Logic;

/**
 * Ensure logic.
 */
trait EnsureLogic
{
    /**
     * @param  bool|Logic $boolOrLogic
     * @return Logic
     */
    final private function ensuredLogic($boolOrLogic): Logic
    {
        $logic = $boolOrLogic;

        if (!$boolOrLogic instanceof Logic) {
            $logic = LogicOf::bool($boolOrLogic);
        }

        return $logic;
    }
}

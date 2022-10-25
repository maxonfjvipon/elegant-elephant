<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic;

/**
 * Ensure logic.
 */
trait EnsureLogic
{
    /**
     * @param bool|Logic $boolOrLogic
     * @return bool
     * @throws Exception
     */
    private function ensuredBool(bool|Logic $boolOrLogic): bool
    {
        if (! is_bool($boolOrLogic)) {
            $boolOrLogic = $boolOrLogic->asBool();
        }

        return $boolOrLogic;
    }
}

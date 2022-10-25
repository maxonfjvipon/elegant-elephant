<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Txt;

use Exception;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Ensure Txt.
 */
trait EnsureTxt
{
    /**
     * @param string|Txt $stringOrTxt
     * @return string
     * @throws Exception
     */
    private function ensuredString(Txt|string $stringOrTxt): string
    {
        if (! is_string($stringOrTxt)) {
            $stringOrTxt = $stringOrTxt->asString();
        }

        return $stringOrTxt;
    }
}

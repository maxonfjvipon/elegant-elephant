<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Txt;

use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Ensure Txt.
 */
trait EnsureTxt
{
    /**
     * @param  string|Txt $stringOrTxt
     * @return Txt
     */
    final private function ensuredTxt($stringOrTxt)
    {
        $txt = $stringOrTxt;

        if (!$stringOrTxt instanceof Txt) {
            $txt = TxtOf::str($txt);
        }

        return $txt;
    }
}

<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Txt;

use Maxonfjvipon\ElegantElephant\Logic;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Text if.
 */
final class TxtIf extends TxtWrap
{
    /**
     * Ctor.
     *
     * @param bool|Logic $condition
     * @param string|Txt $text
     */
    final public function __construct(bool|Logic $condition, string|Txt $text)
    {
        parent::__construct(
            new TxtCond(
                $condition,
                $text,
                new TxtBlank()
            )
        );
    }
}

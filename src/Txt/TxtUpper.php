<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Txt;

use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Text in upper case.
 */
final class TxtUpper extends TxtWrap
{
    use EnsureTxt;

    /**
     * Ctor.
     *
     * @param string|Txt $text
     */
    final public function __construct($text)
    {
        parent::__construct(
            TxtOf::func(fn () => strtoupper($this->ensuredTxt($text)->asString()))
        );
    }
}

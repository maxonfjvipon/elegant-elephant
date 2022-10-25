<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Txt;

use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Text trimmed from right.
 */
final class TxtRtrimmed extends TxtWrap
{
    use EnsureTxt;

    /**
     * Ctor.
     *
     * @param string|Txt $text
     */
    final public function __construct(string|Txt $text)
    {
        parent::__construct(
            TxtOf::func(fn () => rtrim($this->ensuredString($text)))
        );
    }
}

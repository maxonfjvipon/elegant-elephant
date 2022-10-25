<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Txt;

use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Text trimmed.
 */
final class TxtTrimmed extends TxtWrap
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
            TxtOf::func(fn () => trim($this->ensuredString($text)))
        );
    }
}

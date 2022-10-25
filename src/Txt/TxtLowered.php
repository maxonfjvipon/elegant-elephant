<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Txt;

use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Text lowered.
 */
final class TxtLowered extends TxtWrap
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
            TxtOf::func(fn () => strtolower($this->ensuredString($text)))
        );
    }
}

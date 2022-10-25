<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Logic;

use Maxonfjvipon\ElegantElephant\Txt\EnsureTxt;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * In text.
 */
final class InText extends LogicWrap
{
    use EnsureTxt;

    /**
     * Ctor.
     *
     * @param string|Txt $needle
     * @param string|Txt $haystack
     */
    final public function __construct(string|Txt $needle, string|Txt $haystack)
    {
        parent::__construct(
            LogicOf::func(
                fn () => str_contains($this->ensuredString($haystack), $this->ensuredString($needle))
            )
        );
    }
}

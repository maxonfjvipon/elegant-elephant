<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Logic;

use Maxonfjvipon\ElegantElephant\Txt\EnsureTxt;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Matches regex.
 */
final class PregMatch extends LogicWrap
{
    use EnsureTxt;

    /**
     * Ctor.
     *
     * @param string|Txt $pattern
     * @param string|Txt $subject
     */
    final public function __construct(string|Txt $pattern, string|Txt $subject)
    {
        parent::__construct(
            LogicOf::func(
                fn () => (bool) preg_match(
                    $this->ensuredString($pattern),
                    $this->ensuredString($subject),
                )
            )
        );
    }
}

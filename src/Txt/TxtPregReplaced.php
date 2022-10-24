<?php

namespace Maxonfjvipon\ElegantElephant\Txt;

use Maxonfjvipon\ElegantElephant\Any\EnsureAny;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Preg replaced text.
 */
final class TxtPregReplaced extends TxtWrap
{
    use EnsureAny;

    /**
     * Ctor.
     *
     * @param string|array<string>|Txt $pattern
     * @param string|array<string>|Txt $replacement
     * @param string|array<string>|Txt $subject
     */
    final public function __construct($pattern, $replacement, $subject)
    {
        parent::__construct(
            TxtOf::func(
                fn () => preg_replace(
                    $this->ensuredAny($pattern)->value(),
                    $this->ensuredAny($replacement)->value(),
                    $this->ensuredAny($subject)->value()
                )
            )
        );
    }
}

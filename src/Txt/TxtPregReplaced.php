<?php

declare(strict_types=1);

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
    final public function __construct(
        string|array|Txt $pattern,
        string|array|Txt $replacement,
        string|array|Txt $subject
    ) {
        parent::__construct(
            TxtOf::func(
                fn () => preg_replace(
                    $this->ensuredAnyValue($pattern),
                    $this->ensuredAnyValue($replacement),
                    $this->ensuredAnyValue($subject)
                )
            )
        );
    }
}

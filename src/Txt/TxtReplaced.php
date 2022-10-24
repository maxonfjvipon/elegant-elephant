<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Txt;

use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Text replaced.
 */
final class TxtReplaced extends TxtWrap
{
    use EnsureTxt;

    /**
     * Ctor.
     *
     * @param string|Txt $search
     * @param string|Txt $replace
     * @param string|Txt $subject
     */
    final public function __construct($search, $replace, $subject)
    {
        parent::__construct(
            TxtOf::func(
                fn () => str_replace(
                    $this->ensuredTxt($search)->asString(),
                    $this->ensuredTxt($replace)->asString(),
                    $this->ensuredTxt($subject)->asString()
                )
            )
        );
    }
}

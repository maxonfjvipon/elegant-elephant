<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Txt;

use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Substring.
 */
final class TxtSubstr extends TxtWrap
{
    use EnsureTxt;

    /**
     * Ctor.
     *
     * @param string|Txt $text
     * @param int        $offset
     * @param int|null   $length
     */
    final public function __construct($text, int $offset, ?int $length = null)
    {
        parent::__construct(
            TxtOf::func(fn () => substr($this->ensuredTxt($text)->asString(), $offset, $length))
        );
    }
}

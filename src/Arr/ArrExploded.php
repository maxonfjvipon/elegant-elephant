<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Maxonfjvipon\ElegantElephant\Txt\EnsureTxt;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Array exploded.
 */
final class ArrExploded extends ArrWrap
{
    use EnsureTxt;

    /**
     * Exploded by comma.
     *
     * @param  string|Txt $text
     * @return ArrExploded
     */
    final public static function byComma(string|Txt $text): ArrExploded
    {
        return new ArrExploded(",", $text);
    }

    /**
     * Ctor.
     *
     * @param string|Txt $separator
     * @param string|Txt $text
     */
    final public function __construct(string|Txt $separator, string|Txt $text)
    {
        parent::__construct(
            ArrOf::func(fn () => explode($this->ensuredString($separator), $this->ensuredString($text)))
        );
    }
}

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
    final public static function byComma($text): ArrExploded
    {
        return new ArrExploded(",", $text);
    }

    /**
     * Ctor.
     *
     * @param non-empty-string|Txt $separator
     * @param string|Txt           $text
     */
    final public function __construct($separator, $text)
    {
        parent::__construct(
            ArrOf::func(fn () => explode($this->ensuredTxt($separator), $this->ensuredTxt($text)))
        );
    }
}

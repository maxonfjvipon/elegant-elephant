<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Array of split string.
 * Alias of {@see ArrExploded}.
 */
final class ArrSplit extends ArrWrap
{
    /**
     * Exploded by comma.
     *
     * @param string|Txt $text
     * @return self
     */
    final public static function byComma(string|Txt $text): self
    {
        return new self(",", $text);
    }

    /**
     * Ctor.
     *
     * @param non-empty-string|Txt $separator
     * @param string|Txt $text
     */
    final public function __construct(string|Txt $separator, string|Txt $text)
    {
        parent::__construct(
            new ArrExploded($separator, $text)
        );
    }
}
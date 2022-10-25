<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Txt;

use Exception;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Text wrap.
 */
abstract class TxtWrap implements StringableTxt
{
    use TxtToString;

    /**
     * Ctor.
     * @param Txt $origin
     */
    public function __construct(private Txt $origin)
    {
    }

    /**
     * @return string
     * @throws Exception
     */
    final public function asString(): string
    {
        return $this->origin->asString();
    }
}

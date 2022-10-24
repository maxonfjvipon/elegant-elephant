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
     * @var Txt $origin
     */
    private Txt $origin;

    /**
     * Ctor.
     *
     * @param Txt $text
     */
    public function __construct(Txt $text)
    {
        $this->origin = $text;
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

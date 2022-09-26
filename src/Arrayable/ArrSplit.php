<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Array of split string.
 * Alias of {@see ArrExploded}.
 */
final class ArrSplit extends ArrEnvelope
{
    /**
     * Exploded by comma.
     *
     * @param string|Text $text
     * @return self
     */
    public static function byComma($text): self
    {
        return new self(",", $text);
    }

    /**
     * Ctor wrap.
     *
     * @param non-empty-string|Text $separator
     * @param string|Text $text
     * @return self
     */
    public static function new($separator, $text): self
    {
        return new self($separator, $text);
    }

    /**
     * Ctor.
     *
     * @param non-empty-string|Text $separator
     * @param string|Text $text
     */
    public function __construct($separator, $text)
    {
        parent::__construct(
            new ArrExploded($separator, $text)
        );
    }
}

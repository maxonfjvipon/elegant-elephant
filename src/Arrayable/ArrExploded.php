<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\TxtOverloadable;

/**
 * Array exploded
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrExploded extends ArrayableIterable
{
    use TxtOverloadable;

    /**
     * Exploded by comma
     * @param string|Text $text
     * @return ArrExploded
     */
    public static function byComma(string|Text $text): ArrExploded
    {
        return new self(",", $text);
    }

    /**
     * @param string|Text $separator
     * @param string|Text $text
     * @return ArrExploded
     */
    public static function new(string|Text $separator, string|Text $text): ArrExploded
    {
        return new self($separator, $text);
    }

    /**
     * Ctor.
     * @param string|Text $separator
     * @param string|Text $text
     */
    public function __construct(private string|Text $separator, private string|Text $text)
    {
    }

    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array
    {
        return explode(...$this->txtOverloaded($this->separator, $this->text));
    }
}

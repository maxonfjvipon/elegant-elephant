<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text trimmed.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtTrimmed implements Text
{
    use TxtOverloadable;

    /**
     * @param string|Text $text
     * @return TxtTrimmed
     */
    public static function new(string|Text $text): TxtTrimmed
    {
        return new self($text);
    }

    /**
     * Ctor.
     * @param string|Text $text
     */
    public function __construct(private string|Text $text)
    {
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return trim($this->firstTxtOverloaded($this->text));
    }
}
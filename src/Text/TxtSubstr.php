<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Substring of.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtSubstr implements Text
{
    use TxtOverloadable;

    /**
     * @param string|Text $txt
     * @param int $offset
     * @param int|null $length
     * @return TxtSubstr
     */
    public static function new(string|Text $txt, int $offset, int $length = null): TxtSubstr
    {
        return new self($txt, $offset, $length);
    }

    /**
     * Ctor.
     * @param string|Text $text
     * @param int $offset
     * @param int|null $length
     */
    public function __construct(private string|Text $text, private int $offset, private ?int $length = null)
    {
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return substr($this->firstTxtOverloaded($this->text), $this->offset, $this->length);
    }
}

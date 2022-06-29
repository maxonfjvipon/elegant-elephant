<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

final class TxtLtrimmed implements Text
{
    use TxtOverloadable;

    /**
     * @param string|Text $text
     * @return TxtLtrimmed
     */
    public static function new(string|Text $text): TxtLtrimmed
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
        return ltrim($this->firstTxtOverloaded($this->text));
    }
}
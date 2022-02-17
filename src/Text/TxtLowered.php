<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Text lowered of.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtLowered implements Text
{
    use TxtOverloadable;

    /**
     * @var string|Text $text
     */
    private string|Text $text;

    /**
     * Ctor wrap.
     * @param string|Text $text
     * @return TxtLowered
     */
    public static function new(string|Text $text)
    {
        return new self($text);
    }

    /**
     * Ctor.
     * @param string|Text $txt
     */
    public function __construct(string|Text $txt)
    {
        $this->text = $txt;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return strtolower(...$this->txtOverloaded($this->text));
    }
}

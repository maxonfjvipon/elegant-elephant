<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text trimmed.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
class TxtTrimmedOf implements Text
{
    /**
     * @var Text $text
     */
    private Text $text;

    /**
     * Ctor wrap.
     * @param string $string
     * @return TxtTrimmedOf
     */
    public static function string(string $string): TxtTrimmedOf
    {
        return TxtTrimmedOf::text(TextOf::string($string));
    }

    /**
     * Ctor wrap.
     * @param Text $text
     * @return TxtTrimmedOf
     */
    public static function text(Text $text): TxtTrimmedOf
    {
        return new self($text);
    }

    /**
     * Ctor.
     * @param Text $txt
     */
    private function __construct(Text $txt)
    {
        $this->text = $txt;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return trim($this->text->asString());
    }
}
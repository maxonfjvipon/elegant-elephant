<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text upper of.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
class TxtUpperOf implements Text
{
    /**
     * @var Text $text
     */
    private Text $text;

    /**
     * Ctor wrap.
     * @param string $str
     * @return TxtUpperOf
     * @throws Exception
     */
    public static function string(string $str): TxtUpperOf
    {
        return TxtUpperOf::text(TextOf::string($str));
    }

    /**
     * Ctor wrap.
     * @param Text $text
     * @return TxtUpperOf
     * @throws Exception
     */
    public static function text(Text $text): TxtUpperOf
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
        return strtoupper($this->text->asString());
    }
}

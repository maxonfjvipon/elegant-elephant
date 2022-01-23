<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

class TxtLtrimmed implements Text
{
    /**
     * @var Text $origin
     */
    private Text $origin;

    /**
     * Ctor wrap.
     * @param string $string
     * @return TxtLtrimmed
     */
    public static function ofString(string $string): TxtLtrimmed
    {
        return TxtLtrimmed::ofText(TextOf::string($string));
    }

    /**
     * Ctor wrap.
     * @param Text $text
     * @return TxtLtrimmed
     */
    public static function ofText(Text $text): TxtLtrimmed
    {
        return new self($text);
    }

    /**
     * Ctor.
     * @param Text $text
     */
    private function __construct(Text $text)
    {
        $this->origin = $text;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return ltrim($this->origin->asString());
    }
}
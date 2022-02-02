<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Text upper of.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtUpper implements Text
{
    use Overloadable;

    /**
     * @var string|Text $origin
     */
    private string|Text $origin;

    /**
     * @param string|Text $text
     * @return TxtUpper
     */
    public static function new(string|Text $text): TxtUpper
    {
        return new self($text);
    }

    /**
     * Ctor.
     * @param string|Text $text
     */
    public function __construct(string|Text $text)
    {
        $this->origin = $text;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return strtoupper(...self::overload([$this->origin], [[
            'string',
            Text::class => fn(Text $txt) => $txt->asString()
        ]]));
    }
}

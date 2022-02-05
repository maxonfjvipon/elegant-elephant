<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Text trimmed.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtTrimmed implements Text
{
    use Overloadable;

    /**
     * @var string|Text $origin
     */
    private string|Text $origin;

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
    public function __construct(string|Text $text)
    {
        $this->origin = $text;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return trim(...$this->overload([$this->origin], [[
            'string',
            Text::class => fn(Text $txt) => $txt->asString()
        ]]));
    }
}
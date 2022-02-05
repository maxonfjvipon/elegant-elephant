<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Text of.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TextOf implements Text
{
    use Overloadable;

    /**
     * @var float|int|Text|string $origin
     */
    private float|int|string|Text $origin;

    /**
     * Ctor wrap of string.
     * @param string|int|float|Text $str
     * @return TextOf
     */
    public static function new(string|int|float|Text $str): TextOf
    {
        return new self($str);
    }

    /**
     * Ctor.
     * @param string|int|float|Text $str
     */
    public function __construct(string|int|float|Text $str)
    {
        $this->origin = $str;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return $this->overload([$this->origin], [[
            'string',
            'integer' => fn(int $int) => (string)$int,
            'double' => fn(float $fl) => (string)$fl,
            Text::class => fn(Text $txt) => $txt->asString(),
        ]])[0];
    }
}

<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Imploded text.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtImploded implements Text
{
    use Overloadable;

    /**
     * @var string|int|float|Text $separator
     */
    private float|int|string|Text $separator;

    /**
     * @var array $pieces
     */
    private array $pieces;

    /**
     * @param mixed ...$pieces
     * @return TxtImploded
     */
    public static function withComma(...$pieces): TxtImploded
    {
        return TxtImploded::new(",", ...$pieces);
    }

    /**
     * @param string|int|float|Text $separator
     * @param mixed ...$pieces
     * @return TxtImploded
     */
    public static function new(string|int|float|Text $separator, ...$pieces): TxtImploded
    {
        return new self($separator, ...$pieces);
    }

    /**
     * Ctor.
     * @param string|int|float|Text $separator
     * @param mixed ...$pieces
     */
    public function __construct(string|int|float|Text $separator, ...$pieces)
    {
        $this->separator = $separator;
        $this->pieces = $pieces;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {

        return implode(
            self::overload([$this->separator], $this->rules())[0],
            self::overload([...$this->pieces], $this->rules())
        );
    }

    private function rules(): array
    {
        return [[
            'string',
            'double' => fn(float $fl) => (string)$fl,
            'integer' => fn(int $int) => (string)$int,
            'boolean' => fn(bool $bl) => $bl ? "true" : "false",
            Text::class => fn(Text $txt) => $txt->asString()
        ]];
    }
}

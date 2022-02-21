<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Numerable\LengthOf;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Is empty.
 */
final class IsEmpty implements Logical
{
    use Overloadable;

    /**
     * @var array|Arrayable|Text|string $value
     */
    private Text|string|array|Arrayable $value;

    /**
     * @param string|array|Arrayable|Text $value
     * @return IsEmpty
     */
    public static function new(string|array|Arrayable|Text $value)
    {
        return new self($value);
    }

    /**
     * Ctor.
     * @param string|array|Arrayable|Text $value
     */
    public function __construct(string|array|Arrayable|Text $value)
    {
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return $this->overload([$this->value], [[
            'string' => fn(string $str) => $str === "",
            'array' => fn(array $arr) => (new EqualityOf(new LengthOf($arr), 0))->asBool(),
            Text::class => fn(Text $txt) => (new EqualityOf($txt, ""))->asBool(),
            Arrayable::class => fn(Arrayable $arr) => (new EqualityOf(new LengthOf($arr), 0))->asBool()
        ]])[0];
    }
}
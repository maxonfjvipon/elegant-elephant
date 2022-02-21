<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Is not empty.
 */
final class IsNotEmpty implements Logical
{
    use Overloadable;

    /**
     * @var array|Arrayable|Text|string $value
     */
    private Text|string|array|Arrayable $value;

    /**
     * @param string|array|Arrayable|Text $value
     * @return IsNotEmpty
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
        return (new Negation(
            new IsEmpty($this->value)
        ))->asBool();
    }
}
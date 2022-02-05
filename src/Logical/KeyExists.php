<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Key exists.
 * @package Maxonfjvipon\Elegant_Elephant\Logical
 */
final class KeyExists implements Logical
{
    use Overloadable;

    /**
     * @var array|Arrayable $arr
     */
    private array|Arrayable $arr;

    /**
     * @var mixed $key
     */
    private mixed $key;

    /**
     * @param mixed $key
     * @param array|Arrayable $arr
     * @return KeyExists
     */
    public static function new(mixed $key, array|Arrayable $arr): KeyExists
    {
        return new self($key, $arr);
    }

    /**
     * Ctor.
     * @param mixed $key
     * @param array|Arrayable $arr
     */
    public function __construct(mixed $key, array|Arrayable $arr)
    {
        $this->key = $key;
        $this->arr = $arr;
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return array_key_exists(...$this->overload([$this->key, $this->arr], [[
            'integer',
            'double',
            'string',
            'boolean',
            Text::class         => fn(Text $txt) => $txt->asString(),
            Numerable::class    => fn(Numerable $numerable) => $numerable->asNumber()
        ], [
            'array',
            Arrayable::class => fn(Arrayable $arr) => $arr->asArray()
        ]]));
    }
}
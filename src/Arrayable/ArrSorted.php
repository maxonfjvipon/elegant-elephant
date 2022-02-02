<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Arrayable sorted
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrSorted implements Arrayable
{
    use Overloadable;

    /**
     * @var array|Arrayable $arr
     */
    private array|Arrayable $arr;

    /**
     * @var callable $compare
     */
    private $compare;

    /**
     * Ctor wrap.
     * @param array|Arrayable $arr
     * @param callable|null $compare
     * @return ArrSorted
     */
    public static function new(array|Arrayable $arr, callable $compare = null): ArrSorted
    {
        return new self($arr, $compare);
    }

    /**
     * Ctor.
     * @param array|Arrayable $arr
     * @param callable|null $compare
     */
    public function __construct(array|Arrayable $arr, callable $compare = null)
    {
        $this->arr = $arr;
        $this->compare = $compare;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        $arr = self::overload([$this->arr], [[
            'array',
            Arrayable::class => fn(Arrayable $arr) => $arr->asArray()
        ]])[0];
        if ($this->compare != null) {
            usort($arr, $this->compare);
        } else {
            sort($arr);
        }
        return $arr;
    }
}

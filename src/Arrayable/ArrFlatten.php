<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Flatten arrayable
 */
final class ArrFlatten extends ArrayableIterable
{
    use ArrayableOverloaded;

    /**
     * @var array|Arrayable $arr
     */
    private array|Arrayable $arr;

    /**
     * @var int $deep
     */
    private int $deep;

    /**
     * Ctor wrap.
     * @param array|Arrayable $arr
     * @param int $deep
     * @return ArrFlatten
     */
    public static function new(array|Arrayable $arr, int $deep = 1): self
    {
        return new self($arr, $deep);
    }

    /**
     * Ctor.
     * @param array|Arrayable $arr
     * @param int $deep
     */
    public function __construct(array|Arrayable $arr, int $deep = 1)
    {
        $this->arr = $arr;
        $this->deep = $deep;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return $this->flat($this->firstArrayableOverloaded($this->arr), []);
    }

    /**
     * @param array $arr
     * @param array $new
     * @param int $deep
     * @return array
     * @throws Exception
     */
    private function flat(array $arr, array $new, int $deep = 0): array
    {
        foreach ($arr as $item) {
            if ($this->deep !== $deep && (is_array($item) || $item instanceof Arrayable)) {
                $new = $this->flat($this->firstArrayableOverloaded($item), $new, $deep + 1);
            } else {
                $new[] = $item;
            }
        }
        return $new;
    }
}
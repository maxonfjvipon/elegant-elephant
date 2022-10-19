<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar;

/**
 * Arrayable of.
 */
final class ArrayableOf implements IterableArrayable
{
    use HasArrayableIterator;

    /**
     * @var array<mixed>|Scalar $origin
     */
    private $origin;

    /**
     * @param mixed ...$items
     * @return self
     */
    final public static function items(...$items): self
    {
        return new self($items);
    }

    /**
     * Ctor.
     *
     * @param array<mixed>|Scalar $arr
     */
    final public function __construct($arr)
    {
        $this->origin = $arr;
    }

    /**
     * @return array<mixed>
     * @throws Exception
     */
    final public function asArray(): array
    {
        if ($this->origin instanceof Scalar) {
            if (!is_array($res = $this->origin->value())) {
                throw new Exception("Scalar object must be wrapper of array");
            }

            return $res;
        }

        return $this->origin;
    }
}

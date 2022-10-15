<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar;

/**
 * Arrayable of.
 */
final class ArrayableOf implements Arrayable
{
    use HasArrayableIterator;
    use CountArrayable;

    /**
     * @var array<mixed>|Scalar $origin
     */
    private $origin;

    /**
     * @param mixed ...$array
     * @return self
     */
    public static function items(...$array): self
    {
        return new self($array);
    }

    /**
     * Ctor.
     *
     * @param array<mixed>|Scalar $arr
     */
    public function __construct($arr)
    {
        $this->origin = $arr;
    }

    /**
     * @return array<mixed>
     * @throws Exception
     */
    public function asArray(): array
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

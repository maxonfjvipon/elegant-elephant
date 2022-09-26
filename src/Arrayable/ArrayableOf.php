<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;

/**
 * Arrayable of.
 */
final class ArrayableOf extends AbstractArrayable
{
    use CastArrayable;

    /**
     * @var array<mixed>|Any $origin
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
     * Ctor wrap.
     *
     * @param array<mixed>|Any $arr
     * @return self
     */
    public static function new($arr): self
    {
        return new self($arr);
    }

    /**
     * Ctor.
     *
     * @param array<mixed>|Any $arr
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
        if ($this->origin instanceof Any) {
            if (!is_array($res = $this->origin->asAny())) {
                throw new Exception("Any object must be wrapper of array");
            }

            return $res;
        }

        return $this->origin;
    }
}

<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Any;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\CastArrayable;
use Maxonfjvipon\Elegant_Elephant\CastMixed;

/**
 * At key.
 */
final class AtKey implements Any
{
    use CastArrayable;
    use CastMixed;

    /**
     * @var array<mixed>|Arrayable $arr
     */
    private $arr;

    /**
     * @var mixed $key
     */
    private $key;

    /**
     * Ctor wrap.
     *
     * @param array<mixed>|Arrayable $arr
     * @param mixed $key
     * @return self
     */
    public static function new($arr, $key): self
    {
        return new self($arr, $key);
    }

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable $arr
     * @param mixed $key
     */
    public function __construct($arr, $key)
    {
        $this->arr = $arr;
        $this->key = $key;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function asAny()
    {
        return $this->arrayableCast($this->arr)[$this->castMixed($this->key)];
    }
}

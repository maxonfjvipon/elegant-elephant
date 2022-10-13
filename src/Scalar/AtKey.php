<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Scalar;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * At key.
 */
final class AtKey implements Scalar
{
    use CastScalar;

    /**
     * @var array<mixed>|Arrayable<mixed> $arr
     */
    private $arr;

    /**
     * @var string|int|float|Number|Text $key
     */
    private $key;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable<mixed> $arr
     * @param string|int|float|Number|Text $key
     */
    public function __construct($key, $arr)
    {
        $this->key = $key;
        $this->arr = $arr;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function value()
    {
        return $this->scalarCast($this->arr)[$this->scalarCast($this->key)];
    }
}
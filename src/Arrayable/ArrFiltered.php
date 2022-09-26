<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Filtered array.
 */
final class ArrFiltered extends AbstractArrayable
{
    use CastArrayable;

    /**
     * @var array<mixed>|Arrayable $origin
     */
    private $origin;

    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * Ctor wrap.
     *
     * @param array<mixed>|Arrayable $arr
     * @param callable $callback
     * @return self
     */
    public static function new($arr, callable $callback): self
    {
        return new self($arr, $callback);
    }

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable $arr
     * @param callable $callback
     */
    public function __construct($arr, callable $callback)
    {
        $this->origin = $arr;
        $this->callback = $callback;
    }

    /**
     * @return array<mixed>
     * @throws Exception
     */
    public function asArray(): array
    {
        return array_filter($this->arrayableCast($this->origin), $this->callback, ARRAY_FILTER_USE_BOTH);
    }
}

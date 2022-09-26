<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Unique array.
 */
final class ArrUnique extends AbstractArrayable
{
    use CastArrayable;

    /**
     * @var array<mixed>|Arrayable $origin;
     */
    private $origin;

    /**
     * Ctor wrap.
     *
     * @param array<mixed>|Arrayable $arr
     * @return self
     */
    public static function new($arr): self
    {
        return new self($arr);
    }

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable $arr
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
        return array_unique($this->arrayableCast($this->origin));
    }
}

<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Cached array.
 */
final class ArrSticky extends AbstractArrayable
{
    /**
     * @var Arrayable $origin;
     */
    private Arrayable $origin;

    /**
     * @var array<array> $cache
     */
    private array $cache = [];

    /**
     * Ctor wrap.
     *
     * @param Arrayable $arr
     * @return self
     */
    public static function new(Arrayable $arr): self
    {
        return new self($arr);
    }

    /**
     * Ctor.
     *
     * @param Arrayable $arr
     */
    public function __construct(Arrayable $arr)
    {
        $this->origin = $arr;
    }

    /**
     * @return array<mixed>
     * @throws Exception
     */
    public function asArray(): array
    {
        return $this->cache[0] ??= $this->origin->asArray();
    }
}

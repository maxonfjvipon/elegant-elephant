<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Merged array.
 */
final class ArrMerged extends AbstractArrayable
{
    use CastArrayable;

    /**
     * @var array<array<mixed>|Arrayable> $items
     */
    private array $items;

    /**
     * Ctor wrap.
     *
     * @param array<mixed>|Arrayable ...$items
     * @return self
     */
    public static function new(...$items): self
    {
        return new self(...$items);
    }

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable ...$items
     */
    public function __construct(...$items)
    {
        $this->items = $items;
    }

    /**
     * @return array<mixed>
     * @throws Exception
     */
    public function asArray(): array
    {
        return array_merge(...$this->arrayablesCast(...$this->items));
    }
}

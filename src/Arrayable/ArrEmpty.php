<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Empty array.
 */
final class ArrEmpty extends AbstractArrayable
{
    /**
     * Ctor wrap.
     *
     * @return self
     */
    public static function new(): self
    {
        return new self();
    }

    /**
     * @return array<mixed>
     */
    public function asArray(): array
    {
        return [];
    }
}

<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;

/**
 * Array from callback
 */
final class ArrFromCallback extends AbstractArrayable
{
    use CastArrayable;

    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * Ctor wrap.
     *
     * @param callable $callback
     * @return self
     */
    public static function new(callable $callback): self
    {
        return new self($callback);
    }

    /**
     * Ctor.
     *
     * @param callable $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return array<mixed>
     * @throws Exception
     */
    public function asArray(): array
    {
        return $this->arrayableOrCallableCast($this->callback);
    }
}

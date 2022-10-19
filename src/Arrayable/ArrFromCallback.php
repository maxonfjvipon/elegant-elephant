<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Array from callback
 */
final class ArrFromCallback implements IterableArrayable
{
    use CastMixed;
    use HasArrayableIterator;

    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * @var array<mixed> $args
     */
    private array $args;

    /**
     * Ctor.
     *
     * @param callable $callback
     * @param mixed ...$args
     */
    final public function __construct(callable $callback, ...$args)
    {
        $this->callback = $callback;
        $this->args = $args;
    }

    /**
     * @return array<mixed>
     * @throws Exception
     */
    final public function asArray(): array
    {
        if (!is_array($res = $this->mixedOrCallableCast($this->callback, ...$this->args))) {
            throw new Exception("Callback must return an array or Arrayable!");
        }

        return $res;
    }
}

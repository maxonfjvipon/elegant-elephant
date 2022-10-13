<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;

/**
 * Array from callback
 */
final class ArrFromCallback implements Arrayable
{
    use CastScalar;
    use CountArrayable;
    use HasArrayableIterator;

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
    public function value(): array
    {
        if (!is_array($res = $this->scalarOrCallableCast($this->callback))) {
            throw new Exception("Callback must return an array or Arrayable!");
        }

        return $res;
    }
}

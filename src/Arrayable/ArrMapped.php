<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Closure;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;
use ReflectionFunction;

/**
 * Mapped array.
 */
final class ArrMapped extends ArrEnvelope
{
    use CastMixed;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable<mixed> $arr
     * @param callable $callback
     */
    final public function __construct($arr, callable $callback)
    {
        parent::__construct(
            new ArrFromCallback(
                function () use ($arr, $callback) {
                    $count = (new ReflectionFunction(Closure::fromCallable($callback)))->getNumberOfParameters();

                    /** @var array<mixed> $array */
                    $array = $this->mixedCast($arr);

                    /** @var array<array<mixed>> $arguments */
                    $arguments = $count > 1 ? [array_keys($array), $array] : [$array];

                    return array_map($callback, ...$arguments);
                }
            )
        );
    }
}

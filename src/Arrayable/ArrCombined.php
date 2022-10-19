<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Array combined of keys and values.
 */
final class ArrCombined extends ArrEnvelope
{
    use CastMixed;

    /**
     * @var array<mixed>|Arrayable $keys
     */
    private $keys;

    /**
     * @var array<mixed>|Arrayable $values
     */
    private $values;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable $keys
     * @param array<mixed>|Arrayable $values
     */
    final public function __construct($keys, $values)
    {
        parent::__construct(
            new ArrFromCallback(
                function () use ($keys, $values) {
                    /** @var array<mixed> $keys */
                    $keys = (array) $this->mixedCast($keys);

                    /** @var array<mixed> $values */
                    $values = (array) $this->mixedCast($values);

                    if (count($keys) !== count($values)) {
                        throw new Exception("Keys and values arrays must have the same length");
                    }

                    return (array) array_combine(
                        $this->mapped($keys),
                        $this->mapped($values)
                    );
                }
            )
        );
    }

    /**
     * @param array<mixed> $array
     * @return array<mixed>
     * @throws Exception
     */
    private function mapped(array $array): array
    {
        return array_map(
            function ($item) {
                if (is_array($cast = $this->mixedCast($item))) {
                    throw new Exception("Array can't be the key of array");
                }

                return $cast;
            },
            $array
        );
    }
}

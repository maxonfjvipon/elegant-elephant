<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\CastMixed;

/**
 * Array combined of keys and values.
 */
final class ArrCombined extends AbstractArrayable
{
    use CastMixed;

    /**
     * @var array<mixed> $keys
     */
    private array $keys;

    /**
     * @var array<mixed> $values
     */
    private array $values;

    /**
     * Ctor wrap.
     *
     * @param array<mixed> $keys
     * @param array<mixed> $values
     * @return self
     */
    public static function new(array $keys, array $values): self
    {
        return new self($keys, $values);
    }

    /**
     * Ctor.
     *
     * @param array<mixed> $keys
     * @param array<mixed> $values
     */
    public function __construct(array $keys, array $values)
    {
        $this->keys = $keys;
        $this->values = $values;
    }

    /**
     * @return array<mixed>
     * @throws Exception
     */
    public function asArray(): array
    {
        if (count($this->keys) !== count($this->values)) {
            throw new Exception("Keys and values arrays must have the same length");
        }

        return (array)array_combine(
            $this->mapped($this->keys, true),
            $this->mapped($this->values)
        );
    }

    /**
     * @param array<mixed> $array
     * @param bool $checkIsArray
     * @return array<mixed>
     * @throws Exception
     */
    private function mapped(array $array, bool $checkIsArray = false): array
    {
        return array_map(
            function ($item) use ($checkIsArray) {
                $cast = $this->castMixed($item);

                if ($checkIsArray && is_array($cast)) {
                    throw new Exception("Array can't be the key of array");
                }

                return $cast;
            },
            $array
        );
    }
}

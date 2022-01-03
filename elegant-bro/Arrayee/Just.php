<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee;

use ElegantBro\Interfaces\Arrayee;
use Exception;

/**
 * @template T
 * @template TKey
 */
final class Just implements Arrayee
{
    /**
     * @var array<TKey, T>
     */
    private $array;

    /**
     * @param array<TKey, T> $array
     */
    public function __construct(array $array)
    {
        $this->array = $array;
    }

    /**
     * @return array<TKey, T>
     * @throws Exception
     */
    public function asArray(): array
    {
        return $this->array;
    }
}

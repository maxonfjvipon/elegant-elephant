<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee;

use ElegantBro\Interfaces\Arrayee;
use Exception;

use function array_filter;

/**
 * @template T
 */
final class Filtered implements Arrayee
{
    /**
     * @var Arrayee
     */
    private $arrayee;

    /**
     * @var callable
     */
    private $predicate;

    public function __construct(Arrayee $arrayee, callable $predicate)
    {
        $this->arrayee = $arrayee;
        $this->predicate = $predicate;
    }

    /**
     * @return array<T>
     * @throws Exception
     */
    public function asArray(): array
    {
        return array_filter($this->arrayee->asArray(), $this->predicate, ARRAY_FILTER_USE_BOTH);
    }
}

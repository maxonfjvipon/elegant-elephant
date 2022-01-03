<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee\Aggregation;

use ElegantBro\Arrayee\Just;
use ElegantBro\Interfaces\Arrayee;
use Exception;
use RuntimeException;

use function array_reduce;

/**
 * @template V
 */
final class Reduced implements Arrayee
{
    /**
     * @var Arrayee
     */
    private $arrayee;

    /**
     * @var callable
     */
    private $callback;

    /**
     * @var Arrayee
     */
    private $initial;

    /**
     * @param Arrayee $arrayee
     * @param callable $callback Function that reduces items to array <code>function(array $carry, $item): array</code>
     * @param Arrayee $initial
     */
    public function __construct(Arrayee $arrayee, callable $callback, Arrayee $initial)
    {
        $this->arrayee = $arrayee;
        $this->callback = $callback;
        $this->initial = $initial;
    }

    /**
     * @param Arrayee $arrayee
     * @param callable $callback Function that reduces items to array <code>function(array $carry, $item): array</code>
     * @return Reduced<V>
     */
    public static function initialEmpty(Arrayee $arrayee, callable $callback): Reduced
    {
        return new Reduced(
            $arrayee,
            $callback,
            new Just([])
        );
    }

    /**
     * @return array<V>
     * @throws Exception
     */
    public function asArray(): array
    {
        $reduced = array_reduce(
            $this->arrayee->asArray(),
            $this->callback,
            $this->initial->asArray()
        );
        if (!is_array($reduced)) {
            throw new RuntimeException("Reduced is not array");
        }
        return $reduced;
    }
}

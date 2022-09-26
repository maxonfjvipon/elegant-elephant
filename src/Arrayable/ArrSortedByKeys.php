<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Array sorted by keys.
 */
final class ArrSortedByKeys extends AbstractArrayable
{
    use CastArrayable;

    /**
     * @var array<mixed>|Arrayable $origin ;
     */
    private $origin;

    /**
     * @var string|callable|null $compare
     */
    private $compare;

    /**
     * Ctor wrap.
     *
     * @param array<mixed>|Arrayable $arr
     * @param callable|string|null $compare
     * @return self
     */
    public static function new($arr, $compare = null): self
    {
        return new self($arr, $compare);
    }

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable $arr
     * @param callable|string|null $compare
     */
    public function __construct($arr, $compare = null)
    {
        $this->origin = $arr;
        $this->compare = $compare;
    }

    /**
     * @return array<mixed>
     * @throws Exception
     */
    public function asArray(): array
    {
        $arr = $this->arrayableCast($this->origin);

        if (!!$this->compare && !is_callable($this->compare)) {
            throw new Exception("Compare must be callable!");
        }

        $compare = !!$this->compare
            ? (is_string($this->compare)
                ? fn ($a, $b) => $a[$this->compare] <=> $b[$this->compare]
                : $this->compare)
            : fn ($a, $b) => $a <=> $b;

        uksort($arr, $compare);

        return $arr;
    }
}

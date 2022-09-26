<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Flatten array.
 */
final class ArrFlatten extends AbstractArrayable
{
    use CastArrayable;

    /**
     * @var array<mixed>|Arrayable $origin
     */
    private $origin;

    /**
     * @var int $deep
     */
    private int $deep;

    /**
     * Ctor wrap.
     *
     * @param array<mixed>|Arrayable $arr
     * @param int $deep
     * @return self
     */
    public static function new($arr, int $deep = 1): self
    {
        return new self($arr, $deep);
    }

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable $arr
     * @param int $deep
     */
    public function __construct($arr, int $deep = 1)
    {
        $this->origin = $arr;
        $this->deep = $deep;
    }

    /**
     * @return array<mixed>
     * @throws Exception
     */
    public function asArray(): array
    {
        return $this->flat($this->arrayableCast($this->origin), []);
    }

    /**
     * @param array<mixed> $arr
     * @param array<mixed> $new
     * @param int $deep
     * @return array<mixed>
     * @throws Exception
     */
    private function flat(array $arr, array $new, int $deep = 0): array
    {
        foreach ($arr as $item) {
            if ($this->deep !== $deep && (is_array($item) || $item instanceof Arrayable)) {
                $new = $this->flat($this->arrayableCast($item), $new, $deep + 1);
            } else {
                $new[] = $item;
            }
        }

        return $new;
    }
}

<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\CastMixed;

/**
 * Array mapped with key and value handling.
 */
final class ArrMappedKeyValue extends AbstractArrayable
{
    use CastArrayable;
    use CastMixed;

    /**
     * @var array<mixed>|Arrayable $origin
     */
    private $origin;

    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * @var bool $cast
     */
    private bool $cast;

    /**
     * Ctor wrap.
     *
     * @param array<mixed>|Arrayable $arr
     * @param callable $callback
     * @param bool $cast
     * @return self
     */
    public static function new($arr, callable $callback, bool $cast = false): self
    {
        return new self($arr, $callback, $cast);
    }

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable $arr
     * @param callable $callback
     * @param bool $cast
     */
    public function __construct($arr, callable $callback, bool $cast = false)
    {
        $this->origin = $arr;
        $this->callback = $callback;
        $this->cast = $cast;
    }

    /**
     * @return array<mixed>
     * @throws Exception
     */
    public function asArray(): array
    {
        $res = [];

        if (!$this->cast) {
            foreach ($this->arrayableCast($this->origin) as $key => $value) {
                $res[$key] = call_user_func($this->callback, $key, $value);
            }
        } else {
            foreach ($this->arrayableCast($this->origin) as $key => $value) {
                $res[$key] = $this->castMixed(call_user_func($this->callback, $key, $value));
            }
        }

        return $res;
    }
}

<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\CastArrayable;
use Maxonfjvipon\Elegant_Elephant\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Key exists.
 */
final class KeyExists implements Logical
{
    use CastMixed;
    use CastArrayable;

    /**
     * @var int|string|Numerable|Text $key
     */
    private $key;

    /**
     * @var array<mixed>|Arrayable $arr
     */
    private $arr;

    /**
     * Ctor wrap.
     *
     * @param int|string|Numerable|Text $key
     * @param array<mixed>|Arrayable $arr
     * @return self
     */
    public static function new($key, $arr): self
    {
        return new self($key, $arr);
    }

    /**
     * Ctor.
     *
     * @param int|string|Numerable|Text $key
     * @param array<mixed>|Arrayable $arr
     */
    public function __construct($key, $arr)
    {
        $this->key = $key;
        $this->arr = $arr;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function asBool(): bool
    {
        return array_key_exists($this->castMixed($this->key), $this->arrayableCast($this->arr));
    }
}

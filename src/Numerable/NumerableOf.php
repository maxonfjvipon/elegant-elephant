<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Numerable;

/**
 * Numerable of.
 */
final class NumerableOf implements Numerable
{
    use CastNumerable;

    /**
     * @var float|int|Any $origin
     */
    private $origin;

    /**
     * Ctor wrap.
     *
     * @param float|int|Any $num
     * @return self
     */
    public static function new($num): self
    {
        return new self($num);
    }

    /**
     * Ctor.
     *
     * @param float|int|Any $num
     */
    public function __construct($num)
    {
        $this->origin = $num;
    }

    /**
     * @return float|int
     * @throws Exception
     */
    public function asNumber()
    {
        if ($this->origin instanceof Any) {
            $res = $this->origin->asAny();

            if (!is_float($res) && !is_integer($res)) {
                throw new Exception("Any object must be wrapper of Numerable");
            }

            return $res;
        }

        return $this->origin;
    }
}

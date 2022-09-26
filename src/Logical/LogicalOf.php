<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Boolean of.
 */
final class LogicalOf implements Logical
{
    use CastLogical;

    /**
     * @var bool|Any $origin
     */
    private $origin;

    /**
     * Ctor wrap.
     *
     * @param bool|Any $bool
     * @return self
     */
    public static function new($bool): self
    {
        return new self($bool);
    }

    /**
     *
     * Ctor.
     *
     * @param bool|Any $bool
     */
    private function __construct($bool)
    {
        $this->origin = $bool;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function asBool(): bool
    {
        if ($this->origin instanceof Any) {
            if (!is_bool($res = $this->origin->asAny())) {
                throw new Exception("Any object must be wrapper of bool");
            }

            return $res;
        }

        return $this->origin;
    }
}

<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\CastText;
use TypeError;

/**
 * Length.
 */
final class LengthOf implements Numerable
{
    use CastText;

    /**
     * @var string|array<mixed>|Text|Arrayable $origin
     */
    private $origin;

    /**
     * Ctor wrap.
     *
     * @param string|array<mixed>|Text|Arrayable $arg
     * @return self
     */
    public static function new($arg): self
    {
        return new self($arg);
    }

    /**
     * Ctor.
     *
     * @param string|array<mixed>|Text|Arrayable $arg
     */
    public function __construct($arg)
    {
        $this->origin = $arg;
    }

    /**
     * @return int
     * @throws Exception
     */
    public function asNumber(): int
    {
        if (is_array($this->origin) || $this->origin instanceof Arrayable) {
            return count($this->origin);
        }

        return strlen($this->textCast($this->origin));
    }
}

<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Imploded text.
 */
final class TxtImploded extends TxtEnvelope
{
    use CastMixed;

    /**
     * Ctor wrap with comma.
     *
     * @param array<string|Text>|Arrayable $items
     * @return self
     */
    public static function withComma($items): self
    {
        return new self(",", $items);
    }

    /**
     * Ctor.
     *
     * @param string|Text $separator
     * @param array<string|Text>|Arrayable $items
     */
    final public function __construct($separator, $items)
    {
        parent::__construct(
            new TxtFromCallback(
                fn () => implode(
                    (string) $this->mixedCast($separator),
                    $this->mixedArrCast(...$this->mixedCast($items)),
                )
            )
        );
    }
}

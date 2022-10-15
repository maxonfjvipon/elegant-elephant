<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Imploded text.
 */
final class TxtImploded extends TxtEnvelope
{
    use CastMixed;

    /**
     * @param string|Text ...$pieces
     * @return self
     */
    public static function withComma(...$pieces): self
    {
        return new self(",", ...$pieces);
    }

    /**
     * @param string|Text $separator
     * @param array<string|Text> $array
     * @return self
     */
    public static function ofArray($separator, array $array): self
    {
        return new self($separator, ...$array);
    }

    /**
     * Ctor.
     *
     * @param string|Text $separator
     * @param string|Text ...$pieces
     */
    public function __construct($separator, ...$pieces)
    {
        parent::__construct(
            new TxtFromCallback(
                fn () => implode(
                    (string) $this->mixedCast($separator),
                    $this->mixedArrCast(...$pieces)
                )
            )
        );
    }
}

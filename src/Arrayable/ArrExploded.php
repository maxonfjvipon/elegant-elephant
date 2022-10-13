<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Array exploded.
 */
final class ArrExploded extends ArrEnvelope
{
    use CastScalar;

    /**
     * Exploded by comma.
     *
     * @param string|Text $text
     * @return self
     */
    public static function byComma($text): self
    {
        return new self(",", $text);
    }

    /**
     * Ctor.
     *
     * @param non-empty-string|Text $separator
     * @param string|Text $text
     */
    public function __construct($separator, $text)
    {
        parent::__construct(
            new ArrFromCallback(
                function () use ($separator, $text) {
                    /** @var non-empty-string $separator */
                    $separator = (string) $this->scalarCast($separator);

                    $exploded = explode($separator, (string) $this->scalarCast($text));

                    if ($exploded === false) {
                        throw new Exception("Separator can't be an empty string or instance of TxtBlank class");
                    }

                    return $exploded;
                }
            )
        );
    }
}

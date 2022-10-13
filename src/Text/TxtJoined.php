<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text joined.
 */
final class TxtJoined extends TxtEnvelope
{
    /**
     * @param array<string|Text> $array
     * @return self
     */
    public static function ofArray(array $array): self
    {
        return new self(...$array);
    }

    /**
     * Ctor.
     *
     * @param string|Text ...$args
     */
    public function __construct(...$args)
    {
        parent::__construct(
            new TxtImploded(
                new TxtBlank(),
                ...$args
            )
        );
    }
}

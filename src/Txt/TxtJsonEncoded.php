<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Txt;

use Maxonfjvipon\ElegantElephant\Any\EnsureAny;

/**
 * Text encoded to JSON.
 */
final class TxtJsonEncoded extends TxtWrap
{
    use EnsureAny;

    /**
     * Ctor.
     *
     * @param mixed $value
     */
    final public function __construct(mixed $value)
    {
        parent::__construct(
            TxtOf::func(fn () => (string) json_encode($this->ensuredAnyValue($value)))
        );
    }
}

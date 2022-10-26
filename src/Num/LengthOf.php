<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Num;

use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Arr\EnsureArr;
use Maxonfjvipon\ElegantElephant\Txt\EnsureTxt;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Length.
 */
final class LengthOf extends NumWrap
{
    use EnsureTxt;
    use EnsureArr;

    /**
     * @todo: Get rid of ignore line annotations
     * Ctor.
     * @param string|array<mixed>|Txt|Arr $arg
     */
    final public function __construct(string|array|Txt|Arr $arg)
    {
        parent::__construct(
            new NumCond(
                is_array($arg) || $arg instanceof Arr,
                NumOf::func(fn () => count($this->ensuredArray($arg))), /** @phpstan-ignore-line */
                NumOf::func(fn () => strlen($this->ensuredString($arg))) /** @phpstan-ignore-line */
            )
        );
    }
}

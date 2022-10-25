<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Txt;

use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Arr\EnsureArr;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Imploded text.
 */
final class TxtImploded extends TxtWrap
{
    use EnsureTxt;
    use EnsureArr;

    /**
     * Ctor wrap with comma.
     *
     * @param Arr|array<string|Txt> $items
     * @return self
     */
    final public static function withComma(array|Arr $items): self
    {
        return new self(",", $items);
    }

    /**
     * Ctor.
     *
     * @param string|Txt            $separator
     * @param Arr|array<string|Txt> $items
     */
    final public function __construct(string|Txt $separator, array|Arr $items)
    {
        parent::__construct(
            TxtOf::func(
                fn () => implode(
                    $this->ensuredString($separator),
                    array_map(
                        fn ($item) => $this->ensuredString($item),
                        $this->ensuredArray($items)
                    )
                )
            )
        );
    }
}

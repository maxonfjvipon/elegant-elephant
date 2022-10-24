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
     * @param  array<string|Txt>|Arr $items
     * @return self
     */
    final public static function withComma($items): self
    {
        return new self(",", $items);
    }

    /**
     * Ctor.
     *
     * @param string|Txt            $separator
     * @param array<string|Txt>|Arr $items
     */
    final public function __construct($separator, $items)
    {
        parent::__construct(
            TxtOf::func(
                fn () => implode(
                    $this->ensuredTxt($separator)->asString(),
                    array_map(
                        fn ($item) => $this->ensuredTxt($item)->asString(),
                        $this->ensuredArr($items)->asArray()
                    )
                )
            )
        );
    }
}

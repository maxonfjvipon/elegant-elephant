<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Logic;

use Maxonfjvipon\ElegantElephant\Txt\EnsureTxt;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * In text.
 */
final class InText extends LogicWrap
{
    use EnsureTxt;

    /**
     * @var string|Txt $haystack
     */
    private $haystack;

    /**
     * @var string|Txt $needle
     */
    private $needle;

    /**
     * Ctor.
     *
     * @param string|Txt $needle
     * @param string|Txt $haystack
     */
    final public function __construct($needle, $haystack)
    {
        parent::__construct(
            LogicOf::func(
                fn () => strpos(
                    $this->ensuredTxt($haystack)->asString(),
                    $this->ensuredTxt($needle)->asString()
                ) !== false
            )
        );
    }
}

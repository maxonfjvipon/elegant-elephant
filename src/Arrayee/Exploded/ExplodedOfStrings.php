<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayee\Exploded;

use ElegantBro\Stringify\Just;
use JetBrains\PhpStorm\Pure;

class ExplodedOfStrings extends Exploded
{
    /**
     * ExplodedOfStrings constructor.
     * @param string $separator
     * @param string $stringify
     */
    #[Pure] public function __construct(string $separator, string $stringify)
    {
        parent::__construct(new Just($separator), new Just($stringify));
    }
}

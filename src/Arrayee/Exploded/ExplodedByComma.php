<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayee\Exploded;

use ElegantBro\Interfaces\Stringify;
use ElegantBro\Stringify\Just;
use JetBrains\PhpStorm\Pure;

class ExplodedByComma extends Exploded
{
    /**
     * ExplodedByComma constructor.
     * @param Stringify $stringify
     */
    #[Pure] public function __construct(Stringify $stringify)
    {
        parent::__construct(new Just(","), $stringify);
    }
}

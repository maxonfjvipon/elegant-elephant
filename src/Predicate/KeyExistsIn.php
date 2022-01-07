<?php

namespace Maxonfjvipon\Elegant_Elephant\Predicate;

use ElegantBro\Interfaces\Arrayee;
use ElegantBro\Interfaces\Predicate;
use ElegantBro\Interfaces\Stringify;
use Exception;

class KeyExistsIn implements Predicate
{
    private Arrayee $arrayee;

    private Stringify $key;

    public function __construct(Arrayee $arr, Stringify $searchKey)
    {
        $this->arrayee = $arr;
        $this->key = $searchKey;
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return array_key_exists(
            $this->key->asString(),
            $this->arrayee->asArray(),
        );
    }
}

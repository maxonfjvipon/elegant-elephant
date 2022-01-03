<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee;

use ElegantBro\Interfaces\Arrayee;
use ElegantBro\Interfaces\Stringify;
use Exception;
use RuntimeException;

/**
 * @template T
 */
final class JsonDecoded implements Arrayee
{
    /**
     * @var Stringify
     */
    private $json;

    public function __construct(Stringify $json)
    {
        $this->json = $json;
    }

    /**
     * @return array<T>
     * @throws Exception
     */
    public function asArray(): array
    {
        if (null === $res = json_decode($this->json->asString(), true)) {
            throw new RuntimeException(json_last_error_msg());
        }

        if (!is_array($res)) {
            throw new RuntimeException('Json is not an array');
        }

        return $res;
    }
}

<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\File;

use ElegantBro\Interfaces\Stringify;
use Exception;
use RuntimeException;

final class RealPath implements Stringify
{
    /**
     * @var Stringify
     */
    private $path;

    public function __construct(Stringify $path)
    {
        $this->path = $path;
    }

    /**
     * @throws Exception
     */
    public function asString(): string
    {
        if (false === $real = \realpath($this->path->asString())) {
            throw new RuntimeException("Path '{$this->path->asString()}' not exists");
        }

        return $real;
    }
}

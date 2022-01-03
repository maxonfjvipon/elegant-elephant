<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify;

use ElegantBro\Interfaces\Stringify;
use Exception;

final class Cached implements Stringify
{
    /**
     * @var Stringify
     */
    private $origin;

    /**
     * @var string
     */
    private $cache;

    /**
     * @var boolean
     */
    private $filled;

    public function __construct(Stringify $origin)
    {
        $this->origin = $origin;
        $this->filled = false;
    }

    /**
     * @throws Exception
     * @return string
     */
    public function asString(): string
    {
        if ($this->filled) {
            return $this->cache;
        }

        $this->filled = true;

        return $this->cache = $this->origin->asString();
    }

    public function wipeCache(): self
    {
        $this->filled = false;

        return $this;
    }

    public function isFilled(): bool
    {
        return $this->filled;
    }
}

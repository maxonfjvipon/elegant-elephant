<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Any;

use Exception;
use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Any\AnySticky;
use Maxonfjvipon\ElegantElephant\Tests\Support\IsAny;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;

final class AnyStickyTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function cacheWorks(): void
    {
        $this->assertAnyThat(
            $cached = new AnySticky(
                new class ("hello") implements Any {
                    /**
                     * Ctor.
                     * @param string $text
                     */
                    final public function __construct(private string $text)
                    {
                    }

                    final public function value(): string
                    {
                        $this->text = $this->text . " world!";
                        return $this->text;
                    }
                }
            ),
            new IsAny($cached)
        );
    }
}

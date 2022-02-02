<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrExploded;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\TestCase;

class ArrExplodedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $arr = ['foo', 'bar'];
        $separator = "-";
        $string = "foo-bar";
        $this->assertEquals(
            $arr,
            ArrExploded::new($separator, $string)->asArray()
        );
        $this->assertEquals(
            $arr,
            (new ArrExploded(new TextOf($separator), $string))->asArray()
        );
        $this->assertEquals(
            $arr,
            (new ArrExploded($separator, TextOf::new($string)))->asArray()
        );
        $this->assertNotEquals(
            $arr,
            ArrExploded::new(",", $string)->asArray()
        );
    }

    /**
     * @throws Exception
     */
    public function testByComma(): void
    {
        $arr = ['foo', 'bar'];
        $string = "foo,bar";
        $this->assertEquals(
            $arr,
            ArrExploded::byComma(TextOf::new($string))->asArray()
        );
        $this->assertEquals(
            $arr,
            ArrExploded::byComma($string)->asArray()
        );
        $this->assertNotEquals(
            $arr,
            ArrExploded::byComma("foo-bar")->asArray()
        );
    }
}
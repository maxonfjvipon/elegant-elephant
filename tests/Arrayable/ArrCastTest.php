<?php

namespace Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\FirstOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrCast;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrObject;
use Maxonfjvipon\Elegant_Elephant\Boolean\Not;
use Maxonfjvipon\Elegant_Elephant\Boolean\Untruth;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumberOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\SumOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class ArrCastTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function arrCastWorks(): void
    {
        $this->assertScalarThat(
            ArrCast([
                42, // int
                12.5, // float
                'hello there', // string
                ['foo', 'bar'], // array
                true, // boolean
                new SumOf(2, 3), // Numerable
                new TxtUpper("foo"), // Text
                new ArrObject('key', 'value'), // Arrayable
                new Not(new Untruth()), // Logical
                new FirstOf([1, 2, 3]), // Any
            ])->value(),
            new IsEqual([
                42,
                12.5,
                'hello there',
                ['foo', 'bar'],
                true,
                5,
                'FOO',
                ['key' => 'value'],
                true,
                1
            ])
        );
    }
}

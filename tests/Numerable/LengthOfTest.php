<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\LengthOf;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


use function PHPUnit\Framework\assertEquals;

final class LengthOfTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function lengthOfString(): void
    {
        $this->assertScalarThat(
            LengthOf("foo")->value(),
            new IsEqual(3)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function lengthOfText(): void
    {
        $this->assertScalarThat(
            LengthOf(new TxtUpper(new TextOf("foo-bar")))->value(),
            new IsEqual(7)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function lengthOfArray(): void
    {
        $this->assertScalarThat(
            LengthOf([1, 2, 3, 4])->value(),
            new IsEqual(4)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function lengthOfArrayable(): void
    {
        $this->assertScalarThat(
            LengthOf(ArrayableOf::items(1, 2, 3, 4, 5))->value(),
            new IsEqual(5)
        );
    }
}

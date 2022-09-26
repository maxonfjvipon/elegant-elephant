<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\LengthOf;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

final class LengthOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function lengthOfString(): void
    {
        Assert::assertThat(
            LengthOf::new("foo")->asNumber(),
            new IsEqual(3)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function lengthOfText(): void
    {
        Assert::assertThat(
            LengthOf::new(new TxtUpper(new TextOf("foo-bar")))->asNumber(),
            new IsEqual(7)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function lengthOfArray(): void
    {
        Assert::assertThat(
            LengthOf::new([1, 2, 3, 4])->asNumber(),
            new IsEqual(4)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function lengthOfArrayable(): void
    {
        Assert::assertThat(
            LengthOf::new(ArrayableOf::items(1, 2, 3, 4, 5))->asNumber(),
            new IsEqual(5)
        );
    }
}

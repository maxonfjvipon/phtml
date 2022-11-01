<?php

declare(strict_types=1);

namespace Maxonfjvipon\Phtml\Tests;

use Exception;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\Phtml\Attributes;
use Maxonfjvipon\Phtml\Tag\TgPaired;
use Maxonfjvipon\Phtml\Tag\TgUnpaired;
use PHPUnit\Framework\Constraint\IsEqual;

final class TgPairedTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function withNameOnly(): void
    {
        $this->assertTxtThat(
            new TgPaired("html"),
            new IsEqual("<html>\n</html>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function withAttributes(): void
    {
        $this->assertTxtThat(
            new TgPaired(
                "html",
                new Attributes(['class' => 'main', 'id' => 'type'])
            ),
            new IsEqual("<html class='main' id='type'>\n</html>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function withoutAttributesWithTags(): void
    {
        $this->assertTxtThat(
            new TgPaired(
                "html",
                new TgUnpaired("head"),
                new TgPaired("body")
            ),
            new IsEqual("<html>\n<head/>\n<body>\n</body>\n</html>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function withAttributesAndTag(): void
    {
        $this->assertTxtThat(
            new TgPaired(
                "div",
                new Attributes(['class' => 'block']),
                new TgUnpaired("div"),
            ),
            new IsEqual("<div class='block'>\n<div/>\n</div>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function withAttributesOnTheWrongPlace(): void
    {
        $this->assertTxtThat(
            new TgPaired(
                "div",
                new Attributes(['class' => 'block']),
                new Attributes(['class1' => 'block1']),
            ),
            new IsEqual("<div class='block'>\n</div>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function withTxtAndString(): void
    {
        $this->assertTxtThat(
            new TgPaired(
                "div",
                new Attributes(['class' => 'block']),
                TxtOf::str("hello world"),
                "This is string"
            ),
            new IsEqual("<div class='block'>\nhello world\nThis is string\n</div>")
        );
    }
}

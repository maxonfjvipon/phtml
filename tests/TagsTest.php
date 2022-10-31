<?php

declare(strict_types=1);

namespace Maxonfjvipon\Phtml\Tests;

use Exception;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\Phtml\Tag\Tags;
use Maxonfjvipon\Phtml\Tag\TgPaired;
use PHPUnit\Framework\Constraint\IsEqual;

final class TagsTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function tagsWorks(): void
    {
        $this->assertTxtThat(
            new Tags(
                TxtOf::str("<var/>"),
                new TgPaired('xx')
            ),
            new IsEqual("<var/>\n<xx>\n</xx>")
        );
    }
}
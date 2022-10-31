<?php
/**
 * MIT License
 *
 * Copyright (c) 2022 Max Trunnikov
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */
declare(strict_types=1);

namespace Maxonfjvipon\Phtml\Tag;

use Maxonfjvipon\ElegantElephant\Arr\ArrMapped;
use Maxonfjvipon\ElegantElephant\Txt;
use Maxonfjvipon\ElegantElephant\Txt\TxtRtrimmed;
use Maxonfjvipon\ElegantElephant\Txt\TxtToString;
use Maxonfjvipon\ElegantElephant\Txt\TxtWrap;
use Maxonfjvipon\ElegantElephant\Txt\TxtJoined;
use Maxonfjvipon\Phtml\Tag;

/**
 * Tags.
 *
 * @author Max Trunnikov <mtrunnikov@gmail.com>
 * @since 0.0.1
 */
final class Tags extends TxtWrap implements Tag
{
    use TxtToString;

    /**
     * Ctor.
     * @param Txt|Tag ...$tags Tags
     */
    final public function __construct(Txt|Tag ...$tags)
    {
        parent::__construct(
            new TxtRtrimmed(
                new TxtJoined(
                    new ArrMapped(
                        $tags,
                        fn(Tag|Txt $tag) => $tag->asString() . "\n"
                    )
                )
            )
        );
    }
}

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

namespace Maxonfjvipon\Phtml;

use Maxonfjvipon\ElegantElephant\Txt;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\Phtml\Tag\Tags;
use Maxonfjvipon\Phtml\Tag\TgPaired;
use Maxonfjvipon\Phtml\Tag\TgUnpaired;

/**
 * Create unpaired tag.
 *
 * @param string $name
 * @param Attributes|null $attributes
 * @return TgUnpaired
 */
function unpaired(string $name, ?Attributes $attributes = null): Tag
{
    return new TgUnpaired($name, $attributes);
}

/**
 * Create paired tag.
 *
 * @param string $name
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function paired(
    string                         $name,
    string|Attributes|Tag|Txt|null $any = null,
    string|Tag|Txt                 ...$elements
): Tag
{
    return new TgPaired($name, $any, ...$elements);
}

/**
 * Create tag attributes.
 *
 * @param array<string|int, string> $attributes
 * @return Attributes
 */
function attr(array $attributes = []): Attributes
{
    return new Attributes($attributes);
}

/**
 * Create {@see Txt} from string
 *
 * @param string $text
 * @return Txt
 */
function text(string $text = ''): Txt
{
    return TxtOf::str($text);
}

/**
 * Create tags.
 *
 * @param string|Txt|Tag ...$tags
 */
function tags(string|Txt|Tag ...$tags): Tag
{
    return new Tags(...$tags);
}

/****************
 * Paired tags. *
 ****************/

/**
 * Create <html></html> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function html5(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return tags(text("<!DOCTYPE html>"), paired("html", $any, ...$elements));
}


/**
 * Create <a></a> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function a(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('a', $any, ...$elements);
}

/**
 * Create <abbr></abbr> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function abbr(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('abbr', $any, ...$elements);
}

/**
 * Create <address></address> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function address(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('address', $any, ...$elements);
}

/**
 * Create <article></article> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function article(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('article', $any, ...$elements);
}

/**
 * Create <aside></aside> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function aside(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('aside', $any, ...$elements);
}

/**
 * Create <audio></audio> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function audio(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('audio', $any, ...$elements);
}

/**
 * Create <b></b> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function b(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('b', $any, ...$elements);
}

/**
 * Create <bdi></bdi> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function bdi(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('bdi', $any, ...$elements);
}

/**
 * Create <ddo></ddo> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function ddo(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('ddo', $any, ...$elements);
}

/**
 * Create <blockquote></blockquote> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function blockquote(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('blockquote', $any, ...$elements);
}

/**
 * Create <body></body> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function body(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('body', $any, ...$elements);
}

/**
 * Create <button></button> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function button(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('button', $any, ...$elements);
}

/**
 * Create <canvas></canvas> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function canvas(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('canvas', $any, ...$elements);
}

/**
 * Create <caption></caption> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function caption(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('caption', $any, ...$elements);
}

/**
 * Create <cite></cite> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function cite(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('cite', $any, ...$elements);
}

/**
 * Create <code></code> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function code(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('code', $any, ...$elements);
}

/**
 * Create <colgroup></colgroup> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function colgroup(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('colgroup', $any, ...$elements);
}

/**
 * Create <data></data> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function data(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('data', $any, ...$elements);
}

/**
 * Create <datalist></datalist> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function datalist(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('datalist', $any, ...$elements);
}

/**
 * Create <dd></dd> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function dd(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('dd', $any, ...$elements);
}

/**
 * Create <del></del> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function del(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('del', $any, ...$elements);
}

/**
 * Create <dfn></dfn> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function dfn(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('dfn', $any, ...$elements);
}

/**
 * Create <div></div> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function div(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('div', $any, ...$elements);
}

/**
 * Create <dl></dl> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function dl(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('dl', $any, ...$elements);
}

/**
 * Create <dt></dt> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function dt(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('dt', $any, ...$elements);
}

/**
 * Create <em></em> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function em(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('em', $any, ...$elements);
}

/**
 * Create <fieldset></fieldset> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function fieldset(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('fieldset', $any, ...$elements);
}

/**
 * Create <figcaption></figcaption> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function figcaption(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('figcaption', $any, ...$elements);
}

/**
 * Create <figure></figure> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function figure(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('figure', $any, ...$elements);
}

/**
 * Create <footer></footer> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function footer(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('footer', $any, ...$elements);
}

/**
 * Create <form></form> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function form(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('form', $any, ...$elements);
}

/**
 * Create <h1></h1> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function h1(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('h1', $any, ...$elements);
}

/**
 * Create <h2></h2> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function h2(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('h2', $any, ...$elements);
}

/**
 * Create <h3></h3> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function h3(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('h3', $any, ...$elements);
}

/**
 * Create <h4></h4> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function h4(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('h4', $any, ...$elements);
}

/**
 * Create <h5></h5> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function h5(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('h5', $any, ...$elements);
}

/**
 * Create <h6></h6> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function h6(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('h6', $any, ...$elements);
}

/**
 * Create <head></head> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function head(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('head', $any, ...$elements);
}

/**
 * Create <header></header> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function header(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('header', $any, ...$elements);
}

/**
 * Create <i></i> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function i(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('i', $any, ...$elements);
}

/**
 * Create <iframe></iframe> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function iframe(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('iframe', $any, ...$elements);
}

/**
 * Create <ins></ins> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function ins(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('ins', $any, ...$elements);
}

/**
 * Create <kbd></kbd> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function kbd(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('kbd', $any, ...$elements);
}

/**
 * Create <label></label> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function label(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('label', $any, ...$elements);
}

/**
 * Create <legend></legend> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function legend(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('legend', $any, ...$elements);
}

/**
 * Create <li></li> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function li(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('li', $any, ...$elements);
}

/**
 * Create <main></main> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function main(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('main', $any, ...$elements);
}

/**
 * Create <map></map> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function map(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('map', $any, ...$elements);
}

/**
 * Create <mark></mark> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function mark(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('mark', $any, ...$elements);
}

/**
 * Create <meter></meter> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function meter(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('meter', $any, ...$elements);
}

/**
 * Create <nav></nav> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function nav(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('nav', $any, ...$elements);
}

/**
 * Create <noscript></noscript> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function noscript(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('noscript', $any, ...$elements);
}

/**
 * Create <object></object> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function object(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('object', $any, ...$elements);
}

/**
 * Create <ol></ol> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function ol(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('ol', $any, ...$elements);
}

/**
 * Create <optgroup></optgroup> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function optgroup(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('optgroup', $any, ...$elements);
}

/**
 * Create <option></option> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function option(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('option', $any, ...$elements);
}

/**
 * Create <output></output> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function output(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('output', $any, ...$elements);
}

/**
 * Create <p></p> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function p(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('p', $any, ...$elements);
}

/**
 * Create <pre></pre> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function pre(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('pre', $any, ...$elements);
}

/**
 * Create <progress></progress> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function progress(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('progress', $any, ...$elements);
}

/**
 * Create <q></q> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function q(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('q', $any, ...$elements);
}

/**
 * Create <rb></rb> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function rb(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('rb', $any, ...$elements);
}

/**
 * Create <rp></rp> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function rp(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('rp', $any, ...$elements);
}

/**
 * Create <rt></rt> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function rt(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('rt', $any, ...$elements);
}

/**
 * Create <rtc></rtc> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function rtc(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('rtc', $any, ...$elements);
}

/**
 * Create <ruby></ruby> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function ruby(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('ruby', $any, ...$elements);
}

/**
 * Create <s></s> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function s(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('s', $any, ...$elements);
}

/**
 * Create <samp></samp> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function samp(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('samp', $any, ...$elements);
}

/**
 * Create <script></script> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function script(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('script', $any, ...$elements);
}

/**
 * Create <section></section> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function section(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('section', $any, ...$elements);
}

/**
 * Create <select></select> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function select(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('select', $any, ...$elements);
}

/**
 * Create <small></small> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function small(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('small', $any, ...$elements);
}

/**
 * Create <span></span> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function span(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('span', $any, ...$elements);
}

/**
 * Create <strong></strong> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function strong(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('strong', $any, ...$elements);
}

/**
 * Create <style></style> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function style(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('style', $any, ...$elements);
}

/**
 * Create <sub></sub> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function sub(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('sub', $any, ...$elements);
}

/**
 * Create <sup></sup> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function sup(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('sup', $any, ...$elements);
}

/**
 * Create <table></table> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function table(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('table', $any, ...$elements);
}

/**
 * Create <tbody></tbody> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function tbody(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('tbody', $any, ...$elements);
}

/**
 * Create <td></td> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function td(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('td', $any, ...$elements);
}

/**
 * Create <template></template> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function template(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('template', $any, ...$elements);
}

/**
 * Create <textarea></textarea> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function textarea(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('textarea', $any, ...$elements);
}

/**
 * Create <tfoot></tfoot> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function tfoot(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('tfoot', $any, ...$elements);
}

/**
 * Create <th></th> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function th(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('th', $any, ...$elements);
}

/**
 * Create <thead></thead> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function thead(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('thead', $any, ...$elements);
}

/**
 * Create <time></time> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function time(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('time', $any, ...$elements);
}

/**
 * Create <title></title> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function title(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('title', $any, ...$elements);
}

/**
 * Create <tr></tr> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function tr(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('tr', $any, ...$elements);
}

/**
 * Create <u></u> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function u(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('u', $any, ...$elements);
}

/**
 * Create <ul></ul> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function ul(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('ul', $any, ...$elements);
}

/**
 * Create <var></var> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function _var(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('var', $any, ...$elements);
}

/**
 * Create <video></video> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function video(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('video', $any, ...$elements);
}

/**
 * Create <xmp></xmp> tag.
 *
 * @param string|Attributes|Tag|Txt|null $any
 * @param string|Tag|Txt ...$elements
 * @return Tag
 */
function xmp(string|Attributes|Tag|Txt|null $any = null, string|Tag|Txt ...$elements): Tag
{
    return paired('xmp', $any, ...$elements);
}

/****************
 * Unpaired tags. *
 ****************/

/**
 * Create <area/> tag.
 *
 * @param Attributes|null $attributes
 * @return Tag
 */
function area(?Attributes $attributes = null): Tag
{
    return unpaired('area', $attributes);
}

/**
 * Create <base/> tag.
 *
 * @param Attributes|null $attributes
 * @return Tag
 */
function base(?Attributes $attributes = null): Tag
{
    return unpaired('base', $attributes);
}

/**
 * Create <br/> tag.
 *
 * @param Attributes|null $attributes
 * @return Tag
 */
function br(?Attributes $attributes = null): Tag
{
    return unpaired('br', $attributes);
}

/**
 * Create <col/> tag.
 *
 * @param Attributes|null $attributes
 * @return Tag
 */
function col(?Attributes $attributes = null): Tag
{
    return unpaired('col', $attributes);
}

/**
 * Create <command/> tag.
 *
 * @param Attributes|null $attributes
 * @return Tag
 */
function command(?Attributes $attributes = null): Tag
{
    return unpaired('command', $attributes);
}

/**
 * Create <embed/> tag.
 *
 * @param Attributes|null $attributes
 * @return Tag
 */
function embed(?Attributes $attributes = null): Tag
{
    return unpaired('embed', $attributes);
}

/**
 * Create <hr/> tag.
 *
 * @param Attributes|null $attributes
 * @return Tag
 */
function hr(?Attributes $attributes = null): Tag
{
    return unpaired('hr', $attributes);
}

/**
 * Create <img/> tag.
 *
 * @param Attributes|null $attributes
 * @return Tag
 */
function img(?Attributes $attributes = null): Tag
{
    return unpaired('img', $attributes);
}

/**
 * Create <input/> tag.
 *
 * @param Attributes|null $attributes
 * @return Tag
 */
function input(?Attributes $attributes = null): Tag
{
    return unpaired('input', $attributes);
}

/**
 * Create <link/> tag.
 *
 * @param Attributes|null $attributes
 * @return Tag
 */
function link(?Attributes $attributes = null): Tag
{
    return unpaired('link', $attributes);
}

/**
 * Create <meta/> tag.
 *
 * @param Attributes|null $attributes
 * @return Tag
 */
function meta(?Attributes $attributes = null): Tag
{
    return unpaired('meta', $attributes);
}

/**
 * Create <param/> tag.
 *
 * @param Attributes|null $attributes
 * @return Tag
 */
function param(?Attributes $attributes = null): Tag
{
    return unpaired('param', $attributes);
}

/**
 * Create <source/> tag.
 *
 * @param Attributes|null $attributes
 * @return Tag
 */
function source(?Attributes $attributes = null): Tag
{
    return unpaired('source', $attributes);
}

/**
 * Create <track/> tag.
 *
 * @param Attributes|null $attributes
 * @return Tag
 */
function track(?Attributes $attributes = null): Tag
{
    return unpaired('track', $attributes);
}

/**
 * Create <wbr/> tag.
 *
 * @param Attributes|null $attributes
 * @return Tag
 */
function wbr(?Attributes $attributes = null): Tag
{
    return unpaired('wbr', $attributes);
}

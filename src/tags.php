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
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function paired(
    string                         $name,
    Attributes|Tag|Txt|null $any = null,
    Tag|Txt                 ...$elements
): Tag
{
    return new TgPaired($name, $any, ...$elements);
}

/**
 * Create tag attributes.
 *
 * @param array $attributes
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
 * @param Txt|Tag ...$tags
 */
function tags(Txt|Tag ...$tags): Tag
{
    return new Tags(...$tags);
}

/****************
 * Paired tags. *
 ****************/

/**
 * Create <html></html> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function html5(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return tags(text("<!DOCTYPE html>"), paired("html", $any, ...$elements));
}


/**
 * Create <a></a> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function a(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('a', $any, ...$elements);
}

/**
 * Create <abbr></abbr> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function abbr(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('abbr', $any, ...$elements);
}

/**
 * Create <address></address> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function address(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('address', $any, ...$elements);
}

/**
 * Create <article></article> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function article(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('article', $any, ...$elements);
}

/**
 * Create <aside></aside> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function aside(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('aside', $any, ...$elements);
}

/**
 * Create <audio></audio> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function audio(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('audio', $any, ...$elements);
}

/**
 * Create <b></b> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function b(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('b', $any, ...$elements);
}

/**
 * Create <bdi></bdi> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function bdi(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('bdi', $any, ...$elements);
}

/**
 * Create <ddo></ddo> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function ddo(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('ddo', $any, ...$elements);
}

/**
 * Create <blockquote></blockquote> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function blockquote(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('blockquote', $any, ...$elements);
}

/**
 * Create <body></body> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function body(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('body', $any, ...$elements);
}

/**
 * Create <button></button> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function button(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('button', $any, ...$elements);
}

/**
 * Create <canvas></canvas> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function canvas(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('canvas', $any, ...$elements);
}

/**
 * Create <caption></caption> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function caption(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('caption', $any, ...$elements);
}

/**
 * Create <cite></cite> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function cite(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('cite', $any, ...$elements);
}

/**
 * Create <code></code> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function code(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('code', $any, ...$elements);
}

/**
 * Create <colgroup></colgroup> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function colgroup(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('colgroup', $any, ...$elements);
}

/**
 * Create <data></data> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function data(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('data', $any, ...$elements);
}

/**
 * Create <datalist></datalist> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function datalist(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('datalist', $any, ...$elements);
}

/**
 * Create <dd></dd> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function dd(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('dd', $any, ...$elements);
}

/**
 * Create <del></del> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function del(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('del', $any, ...$elements);
}

/**
 * Create <dfn></dfn> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function dfn(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('dfn', $any, ...$elements);
}

/**
 * Create <div></div> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function div(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('div', $any, ...$elements);
}

/**
 * Create <dl></dl> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function dl(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('dl', $any, ...$elements);
}

/**
 * Create <dt></dt> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function dt(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('dt', $any, ...$elements);
}

/**
 * Create <em></em> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function em(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('em', $any, ...$elements);
}

/**
 * Create <fieldset></fieldset> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function fieldset(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('fieldset', $any, ...$elements);
}

/**
 * Create <figcaption></figcaption> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function figcaption(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('figcaption', $any, ...$elements);
}

/**
 * Create <figure></figure> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function figure(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('figure', $any, ...$elements);
}

/**
 * Create <footer></footer> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function footer(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('footer', $any, ...$elements);
}

/**
 * Create <form></form> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function form(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('form', $any, ...$elements);
}

/**
 * Create <h1></h1> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function h1(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('h1', $any, ...$elements);
}

/**
 * Create <h2></h2> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function h2(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('h2', $any, ...$elements);
}

/**
 * Create <h3></h3> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function h3(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('h3', $any, ...$elements);
}

/**
 * Create <h4></h4> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function h4(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('h4', $any, ...$elements);
}

/**
 * Create <h5></h5> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function h5(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('h5', $any, ...$elements);
}

/**
 * Create <h6></h6> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function h6(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('h6', $any, ...$elements);
}

/**
 * Create <head></head> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function head(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('head', $any, ...$elements);
}

/**
 * Create <header></header> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function header(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('header', $any, ...$elements);
}

/**
 * Create <i></i> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function i(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('i', $any, ...$elements);
}

/**
 * Create <iframe></iframe> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function iframe(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('iframe', $any, ...$elements);
}

/**
 * Create <ins></ins> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function ins(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('ins', $any, ...$elements);
}

/**
 * Create <kbd></kbd> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function kbd(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('kbd', $any, ...$elements);
}

/**
 * Create <label></label> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function label(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('label', $any, ...$elements);
}

/**
 * Create <legend></legend> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function legend(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('legend', $any, ...$elements);
}

/**
 * Create <li></li> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function li(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('li', $any, ...$elements);
}

/**
 * Create <main></main> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function main(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('main', $any, ...$elements);
}

/**
 * Create <map></map> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function map(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('map', $any, ...$elements);
}

/**
 * Create <mark></mark> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function mark(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('mark', $any, ...$elements);
}

/**
 * Create <meter></meter> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function meter(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('meter', $any, ...$elements);
}

/**
 * Create <nav></nav> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function nav(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('nav', $any, ...$elements);
}

/**
 * Create <noscript></noscript> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function noscript(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('noscript', $any, ...$elements);
}

/**
 * Create <object></object> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function object(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('object', $any, ...$elements);
}

/**
 * Create <ol></ol> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function ol(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('ol', $any, ...$elements);
}

/**
 * Create <optgroup></optgroup> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function optgroup(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('optgroup', $any, ...$elements);
}

/**
 * Create <option></option> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function option(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('option', $any, ...$elements);
}

/**
 * Create <output></output> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function output(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('output', $any, ...$elements);
}

/**
 * Create <p></p> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function p(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('p', $any, ...$elements);
}

/**
 * Create <pre></pre> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function pre(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('pre', $any, ...$elements);
}

/**
 * Create <progress></progress> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function progress(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('progress', $any, ...$elements);
}

/**
 * Create <q></q> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function q(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('q', $any, ...$elements);
}

/**
 * Create <rb></rb> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function rb(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('rb', $any, ...$elements);
}

/**
 * Create <rp></rp> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function rp(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('rp', $any, ...$elements);
}

/**
 * Create <rt></rt> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function rt(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('rt', $any, ...$elements);
}

/**
 * Create <rtc></rtc> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function rtc(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('rtc', $any, ...$elements);
}

/**
 * Create <ruby></ruby> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function ruby(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('ruby', $any, ...$elements);
}

/**
 * Create <s></s> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function s(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('s', $any, ...$elements);
}

/**
 * Create <samp></samp> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function samp(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('samp', $any, ...$elements);
}

/**
 * Create <script></script> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function script(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('script', $any, ...$elements);
}

/**
 * Create <section></section> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function section(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('section', $any, ...$elements);
}

/**
 * Create <select></select> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function select(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('select', $any, ...$elements);
}

/**
 * Create <small></small> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function small(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('small', $any, ...$elements);
}

/**
 * Create <span></span> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function span(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('span', $any, ...$elements);
}

/**
 * Create <strong></strong> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function strong(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('strong', $any, ...$elements);
}

/**
 * Create <style></style> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function style(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('style', $any, ...$elements);
}

/**
 * Create <sub></sub> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function sub(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('sub', $any, ...$elements);
}

/**
 * Create <sup></sup> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function sup(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('sup', $any, ...$elements);
}

/**
 * Create <table></table> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function table(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('table', $any, ...$elements);
}

/**
 * Create <tbody></tbody> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function tbody(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('tbody', $any, ...$elements);
}

/**
 * Create <td></td> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function td(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('td', $any, ...$elements);
}

/**
 * Create <template></template> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function template(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('template', $any, ...$elements);
}

/**
 * Create <textarea></textarea> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function textarea(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('textarea', $any, ...$elements);
}

/**
 * Create <tfoot></tfoot> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function tfoot(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('tfoot', $any, ...$elements);
}

/**
 * Create <th></th> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function th(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('th', $any, ...$elements);
}

/**
 * Create <thead></thead> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function thead(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('thead', $any, ...$elements);
}

/**
 * Create <time></time> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function time(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('time', $any, ...$elements);
}

/**
 * Create <title></title> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function title(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('title', $any, ...$elements);
}

/**
 * Create <tr></tr> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function tr(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('tr', $any, ...$elements);
}

/**
 * Create <u></u> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function u(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('u', $any, ...$elements);
}

/**
 * Create <ul></ul> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function ul(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('ul', $any, ...$elements);
}

/**
 * Create <var></var> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function _var(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('var', $any, ...$elements);
}

/**
 * Create <video></video> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function video(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
{
    return paired('video', $any, ...$elements);
}

/**
 * Create <xmp></xmp> tag.
 *
 * @param Attributes|Tag|Txt|null $any
 * @param Tag|Txt ...$elements
 * @return Tag
 */
function xmp(Attributes|Tag|Txt|null $any = null, Tag|Txt ...$elements): Tag
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

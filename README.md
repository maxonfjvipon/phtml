# phtml

phtml is pure object-oriented HTML construction templating library for PHP with functional interface, inspired by [JavaTags](https://github.com/manlioGit/javatags) and [ScalaTags](https://github.com/lihaoyi/scalatags). 

[![EO principles respected here](https://www.elegantobjects.org/badge.svg)](https://www.elegantobjects.org)
[![DevOps By Rultor.com](http://www.rultor.com/b/maxonfjvipon/phtml)](http://www.rultor.com/p/maxonfjvipon/phtml)

[![Composer](https://github.com/maxonfjvipon/phtml/actions/workflows/composer.yml/badge.svg)](https://github.com/maxonfjvipon/phtml/actions/workflows/composer.yml)
[![codecov](https://codecov.io/github/maxonfjvipon/phtml/branch/master/graph/badge.svg?token=Q122MWPT8J)](https://codecov.io/github/maxonfjvipon/phtml)
[![Hits-of-Code](https://hitsofcode.com/github/maxonfjvipon/phtml?branch=master)](https://hitsofcode.com/github/maxonfjvipon/phtml/view?branch=master)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](https://github.com/maxonfjvipon/phtml/blob/master/LICENSE)
[![Tag](https://img.shields.io/github/tag/maxonfjvipon/phtml.svg)](https://github.com/maxonfjvipon/phtml/releases)


This fragment:

```php
use Maxonfjvipon\Phtml\at;
use function Maxonfjvipon\Phtml\{html5, attr, head, meta, title, link, text};

html5(attr([at::lang => 'en']),
  head(
    meta(attr([at::http_equiv => 'Content-Type', at::content => 'text/html', at::charset => 'UTF-8'])),
    title(text("Title")),
    link(attr(["href" => "/css/custom.css", "rel" => "stylesheet"]))
  )
)->asString();
```

will be turned into this html:

```html
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>
    <title>Title</title>
    <link href='/css/custom.css' rel='stylesheet'/>
 </head>
</html>
```

## Getting started:

### Requirements

- PHP >= 8.0

### Installation

```
composer require maxonfjvipon/phtml
```

## Examples


### basic:

Library provides all html tags as functions with only one exception - `<var></var>`. PHP does not allow you to create function named `var` since this word is reserved. So to create `<var></var>` tag use `_var` function 

#### ***(if you know more elegant way to handle this `<var></var>` - please create an issue)***

This code

```php
use function Maxonfjvipon\Phtml\{html5, head, body, div, _var, text};

html5(
  head(),
  body(
    div(
      _var(text("Hello world!"))
    )
  )
)->asString();
```

will render to you this html:
```html
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <div>
      <var>Hello world!</var>
    </div>
  </body>
</html>
```

### Attributes:

To add attributes to your tag you should use `attr` function. Function accepts an array with arguments.
Array may has `'key' => 'value'` and just `'value'` elements:

```php
use function Maxonfjvipon\Phtml\{a, attr};

a(attr(['href' => '/some/url', "download"]))->asString(); // <a href='/some/url' download></a>
```

Attributes will be rendered only if they are at the first place. Other attributes on other places will be ignored.
```php
use function Maxonfjvipon\Phtml\{a, attr};

div(attr(['class' => 'div']), div())->asString(); // <div class='div'><div></div></div>
div(div(), attr(['class' => 'div']))->asString(); // <div><div></div></div>
```

Library provides helper class `Maxonfjvipon\Phtml\at` that contains all existed html attributes as consts.
You can use it in this way:

```php
use Maxonfjvipon\Phtml\at;
use function Maxonfjvipon\Phtml\{html5, attr};

html5(attr([at::lang => "en"]))->asString(); // <!DOCTYPE html><html lang='en'></html>
```

#### Note!
`at::class` will return you `\Maxonfjvipon\Phtml\at` instead of expected `'class'` (since `::class` is reserved by PHP)

#### ***(if it's possible to override this `::class` and you know how to do it - please create an issue)***

To get `'class'` string from `at` you can do `at::_class` or `at::$class`. Or you can just write it manually

```php
use Maxonfjvipon\Phtml\at;
use function Maxonfjvipon\Phtml\{html5, attr};

attr([at::class => 'main'])->asString(); // \Maxonfjvipon\Phtml\at='main'
attr(['class' => 'main'])->asString(); // class='main'
attr([at::$class => 'main'])->asString(); // class='main'
attr([at::_class => 'main'])->asString(); // class='main'
```

### Helpers:

#### Custom tags

You can create your custom tags using 2 helper functions: `paired` and `unpaired`:
```php
use function Maxonfjvipon\Phtml\{unpaired, paired};

unpaired('somebody', attr(['class' => 'custom unpaired']))->asString(); // <somebody class='custom unpaired'/>
paired('somebody', attr(['class' => 'custom paired']))->asString(); // <somebody class='custom paired'></somebody>
```

If you want to add many tags (for example from array) you can use `tags` function:

```php
use function Maxonfjvipon\Phtml\{tags, div, unpaired, link};

tags(div(), unpaired('my'), link())->asString(); // <div></div><my/><link/>
```

#### Strings, Tags and Texts

Library is based on `Maxonfjvipon\ElegantElephant\Txt` class from [ElegantElephant](https://github.com/maxonfjvipon/ElegantElephant).
So besides attributes every paired tag can accept other tags, strings and Texts.

This tag:

```php
use Maxonfjvipon\ElegantElephant\TxtOf;
use function Maxonfjvipon\Phtml\{div, link};

div(attr(['class' => 'main']),
  link(), // other tag
  TxtOf::str('text'), // Text
  text("alias"), // wrap string to Maxonfjvipon\ElegantElephant\Txt
  "just string",
)->asString();
```

will be turned into:

```html
<div class='main'>
  <link/>\n
  text\n
  alias\n
  just string\n
</div>
```

#### Import

If you want to use all available tags and functions you have to add this import.

#### ***(if you know how to make this whole import shorter - please create an issue)***

Keep in mind that some tag functions have the same name as built in php functions (like `\header()`, `\time()`, etc). 
So make sure that you have imported these functions before using them.

```php
use function Maxonfjvipon\Phtml\{
    text,
    unpaired,
    paired,
    a,
    abbr,
    address,
    article,
    aside,
    audio,
    b,
    bdi,
    ddo,
    blockquote,
    body,
    button,
    canvas,
    caption,
    cite,
    code,
    colgroup,
    data,
    datalist,
    dd,
    del,
    dfn,
    div,
    dl,
    dt,
    em,
    fieldset,
    figcaption,
    figure,
    footer,
    form,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    head,
    header,
    i,
    iframe,
    ins,
    kbd,
    label,
    legend,
    li,
    main,
    map,
    mark,
    meter,
    nav,
    noscript,
    object,
    ol,
    optgroup,
    option,
    output,
    p,
    pre,
    progress,
    q,
    rb,
    rp,
    rt,
    rtc,
    ruby,
    s,
    samp,
    script,
    section,
    select,
    small,
    span,
    strong,
    style,
    sub,
    sup,
    table,
    tbody,
    td,
    template,
    textarea,
    tfoot,
    th,
    thead,
    time,
    title,
    tr,
    u,
    ul,
    video,
    attr,
    tags,
    br,
    html5,
    area,
    base,
    col,
    command,
    embed,
    hr,
    img,
    input,
    link,
    meta,
    param,
    source,
    track,
    wbr,
    _var,
    xmp
};
```

### Contribution

Fork repository, make changes, send a pull request. To avoid frustration, before sending your pull request please run:

```bash
$ ./pre-push.sh
```

And make sure you have no errors.

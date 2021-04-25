<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://github.com/yiisoft.png" height="100px">
    </a>
</p>
<h1 align="center">Yii simple message formatter</h1>

This package allow to format messages in simple mode.
When translating a message, you can embed some placeholders and have them replaced by dynamic parameter values.

[![Latest Stable Version](https://poser.pugx.org/yiisoft/translator-formatter-simple/v/stable.png)](https://packagist.org/packages/yiisoft/translator-formatter-simple)
[![Total Downloads](https://poser.pugx.org/yiisoft/translator-formatter-simple/downloads.png)](https://packagist.org/packages/yiisoft/translator-formatter-simple)
[![Build status](https://github.com/yiisoft/translator-formatter-simple/workflows/build/badge.svg)](https://github.com/yiisoft/translator-formatter-simple/actions?query=workflow%3Abuild)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/yiisoft/translator-formatter-simple/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/yiisoft/translator-formatter-simple/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/yiisoft/translator-formatter-simple/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/yiisoft/translator-formatter-simple/?branch=master)
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fyiisoft%2Ftranslator-formatter-simple%2Fmaster)](https://dashboard.stryker-mutator.io/reports/github.com/yiisoft/translator-formatter-simple/master)
[![static analysis](https://github.com/yiisoft/translator-formatter-simple/workflows/static%20analysis/badge.svg)](https://github.com/yiisoft/translator-formatter-simple/actions?query=workflow%3A%22static+analysis%22)

## Installation

The package could be installed with composer:

```
composer require yiisoft/translator-formatter-simple
```

## Configuration

In case you use [`yiisoft/config`](http://github.com/yiisoft/config), you will get configuration automatically. If not, the following DI container configuration is necessary:

```php
<?php

declare(strict_types=1);

use Yiisoft\Translator\MessageFormatterInterface;
use Yiisoft\Translator\Formatter\Simple\SimpleMessageFormatter;

return [
    MessageFormatterInterface::class => SimpleMessageFormatter::class,
];
```

## General usage

### Example of usage with `yiisoft/translator`
```php
/** @var \Yiisoft\Translator\Translator $translator **/

$categoryName = 'moduleId';
$pathToModuleTranslations = './module/messages/';
$additionalCategory = new Yiisoft\Translator\CategorySource(
    $categoryName, 
    new \Yiisoft\Translator\Message\Php\MessageSource($pathToModuleTranslations),
    new \Yiisoft\Translator\Formatter\Simple\SimpleMessageFormatter()
);
$translator->addCategorySource($additionalCategory);

$translator->translate('Test string: {str}', ['str' => 'string data'], 'moduleId', 'en');
// output: Test string: string data
```

### Example of usage without `yiisoft/translator` package
```php

/** @var \Yiisoft\Translator\Formatter\Simple\SimpleMessageFormatter $formatter */
$pattern = 'Test number: {number}';
$params = ['number' => 5];
$locale = 'en';
echo $formatter->format($pattern, $params, $locale);
// output: Test number: 5

$pattern = 'Test string: {str}';
$params = ['str' => 'string data'];
echo $formatter->format($pattern, $params, $locale);
// output: Test string: string data 
```

## Unit testing

The package is tested with [PHPUnit](https://phpunit.de/). To run tests:

```php
./vendor/bin/phpunit
```

## Mutation testing

The package tests are checked with [Infection](https://infection.github.io/) mutation framework. To run it:

```php
./vendor/bin/infection
```

## Static analysis

The code is statically analyzed with [Psalm](https://psalm.dev/). To run static analysis:

```php
./vendor/bin/psalm
```

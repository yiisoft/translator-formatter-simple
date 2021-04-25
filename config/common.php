<?php

declare(strict_types=1);

use Yiisoft\Translator\MessageFormatterInterface;
use Yiisoft\Translator\Formatter\Simple\SimpleMessageFormatter;

return [
    MessageFormatterInterface::class => SimpleMessageFormatter::class,
];

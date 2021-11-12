<?php

declare(strict_types=1);

$date = date('Y-m-d');

echo '[Log]', \PHP_EOL;
$fileName = \dirname(__DIR__) . '/tests/logs/log-' . date('Y-m-d') . '.log';
if (is_file($fileName))
{
    echo file_get_contents($fileName), \PHP_EOL;
}
else
{
    echo 'Not found!', \PHP_EOL;
}

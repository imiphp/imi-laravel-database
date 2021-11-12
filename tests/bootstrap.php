<?php

declare(strict_types=1);

require \dirname(__DIR__) . '/vendor/autoload.php';

echo 'env:',\PHP_EOL;
var_dump(getenv());

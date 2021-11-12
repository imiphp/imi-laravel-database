<?php

declare(strict_types=1);

require \dirname(__DIR__) . '/vendor/autoload.php';

for ($i = 0; $i < 30; ++$i)
{
    try
    {
        new PDO('mysql:'
        . 'host=' . imiGetEnv('MYSQL_SERVER_HOST', '127.0.0.1')
        . ';port=' . imiGetEnv('MYSQL_SERVER_PORT', 3306)
        . ';dbname=db_imi_test', imiGetEnv('MYSQL_SERVER_USERNAME', 'root'), imiGetEnv('MYSQL_SERVER_PASSWORD', 'root'));

        return;
    }
    catch (\Throwable $th)
    {
        if ('SQLSTATE[HY000] [2002] Connection refused' !== $th->getMessage())
        {
            throw $th;
        }
    }
    sleep(1);
}

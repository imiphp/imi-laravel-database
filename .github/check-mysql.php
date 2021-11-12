<?php

declare(strict_types=1);

for ($i = 0; $i < 30; ++$i)
{
    try
    {
        new PDO('mysql:'
        . 'host=' . (getenv('MYSQL_SERVER_HOST') ?: '127.0.0.1')
        . ';port=' . (getenv('MYSQL_SERVER_PORT') ?: 3306)
        . ';dbname=db_imi_test', getenv('MYSQL_SERVER_USERNAME') ?: 'root', getenv('MYSQL_SERVER_PASSWORD') ?: 'root');

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

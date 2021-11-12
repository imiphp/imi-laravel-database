<?php

declare(strict_types=1);

namespace Imi\Laravel\Database\Test;

use Imi\App;
use Imi\Db\Interfaces\IDb;
use Imi\Event\Event;
use Imi\Event\EventParam;
use Imi\Pool\Interfaces\IPoolResource;
use Imi\Pool\PoolManager;
use PHPUnit\Runner\BeforeFirstTestHook;

class PHPUnitHook implements BeforeFirstTestHook
{
    public function executeBeforeFirstTest(): void
    {
        Event::on('IMI.APP_RUN', function (EventParam $param) {
            PoolManager::use('mysql', function (IPoolResource $resource, IDb $db) {
                $db->batchExec(file_get_contents(__DIR__ . '/db/mysql.sql'));
            });
        }, 1);
        App::run('Imi\Laravel\Database\Test', TestApp::class);
    }
}

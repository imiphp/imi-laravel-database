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
            $param->stopPropagation();
            PoolManager::use('maindb', function (IPoolResource $resource, IDb $db) {
                $truncateList = [
                    'tb_article',
                    'tb_article2',
                    'tb_article_ex',
                    'tb_member',
                    'tb_member_role_relation',
                    'tb_update_time',
                    'tb_performance',
                    'tb_polymorphic',
                    'tb_test_json',
                    'tb_test_list',
                    'tb_test_soft_delete',
                ];
                foreach ($truncateList as $table)
                {
                    $db->exec('TRUNCATE ' . $table);
                }
            });
        }, 1);
        App::run('Imi\Laravel\Database\Test', TestApp::class);
    }
}

<?php

declare(strict_types=1);

namespace Imi\Laravel\Database\Test\Unit\Db\MySql;

use Imi\Laravel\Database\Test\Unit\Db\DbBaseTest;

class DbQueryTest extends DbBaseTest
{
    /**
     * 连接池名.
     *
     * @var string
     */
    protected $poolName = 'mysql';
}

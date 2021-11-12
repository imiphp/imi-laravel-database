<?php

declare(strict_types=1);

namespace Imi\Laravel\Database\Test\Unit\Model\MySql;

use Imi\Laravel\Database\Test\Unit\Model\ModelBaseTest;

class ModelTest extends ModelBaseTest
{
    /**
     * 连接池名.
     *
     * @var string
     */
    protected $poolName = 'maindb';
}

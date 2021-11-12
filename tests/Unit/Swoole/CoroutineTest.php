<?php

declare(strict_types=1);

namespace Imi\Laravel\Database\Test\Unit\Model;

use Illuminate\Support\Facades\DB;
use Imi\Laravel\Database\Test\Model\Member;
use PHPUnit\Framework\TestCase;
use Swoole\Coroutine\WaitGroup;

class CoroutineTest extends TestCase
{
    public function testDb(): void
    {
        $waitGroup = new WaitGroup();
        $time = microtime(true);
        for ($i = 0; $i < 10; ++$i)
        {
            $waitGroup->add();
            imigo(function () use ($waitGroup) {
                try
                {
                    DB::statement('select sleep(1)');
                }
                finally
                {
                    $waitGroup->done();
                }
            });
        }
        $waitGroup->wait(2);
        $this->assertLessThan(1.5, microtime(true) - $time);
    }

    public function testModel(): void
    {
        $waitGroup = new WaitGroup();
        $time = microtime(true);
        for ($i = 0; $i < 10; ++$i)
        {
            $waitGroup->add();
            imigo(function () use ($waitGroup) {
                try
                {
                    Member::query()->find(1);
                }
                finally
                {
                    $waitGroup->done();
                }
            });
        }
        $waitGroup->wait(2);
        $this->assertLessThan(1.5, microtime(true) - $time);
    }
}

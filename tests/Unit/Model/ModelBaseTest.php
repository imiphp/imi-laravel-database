<?php

declare(strict_types=1);

namespace Imi\Laravel\Database\Test\Unit\Model;

use Imi\Laravel\Database\Test\Model\Member;
use PHPUnit\Framework\TestCase;

abstract class ModelBaseTest extends TestCase
{
    /**
     * 连接池名.
     *
     * @var string
     */
    protected $poolName;

    public function testInsert(): array
    {
        $member = new Member();
        $member->username = '1';
        $member->password = '2';
        $this->assertTrue($member->save());
        $this->assertGreaterThan(0, $member->id);

        return [
            'id' => $member->id,
        ];
    }
}

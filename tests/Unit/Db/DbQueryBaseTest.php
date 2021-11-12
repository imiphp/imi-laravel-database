<?php

declare(strict_types=1);

namespace Imi\Laravel\Database\Test\Unit\Db;

use Illuminate\Database\ConnectionInterface;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\TestCase;

abstract class DbQueryBaseTest extends TestCase
{
    /**
     * 连接池名.
     *
     * @var string
     */
    protected $poolName;

    protected function getConnection(): ConnectionInterface
    {
        return DB::connection($this->poolName);
    }

    public function testInsert(): array
    {
        $db = $this->getConnection();
        $db->select('TRUNCATE tb_article');
        $id = $db->table('tb_article')->insertGetId([
            'title'   => 'title',
            'content' => 'content',
            'time'    => '2019-06-21',
        ]);
        $this->assertEquals(1, $id);

        return ['id' => $id];
    }

    /**
     * @depends testInsert
     */
    public function testUpdate(array $args): array
    {
        $db = $this->getConnection();
        $this->assertEquals(1, $db->table('tb_article')->where('id', $args['id'])->update([
            'content' => 'content-updated',
            'time'    => '2021-01-01 00:00:00',
        ]));

        return $args;
    }

    /**
     * @depends testUpdate
     */
    public function testSelect(array $args): void
    {
        $db = $this->getConnection();
        $this->assertEquals([[
            'id'        => (int) $args['id'],
            'member_id' => 0,
            'title'     => 'title',
            'content'   => 'content-updated',
            'time'      => '2021-01-01 00:00:00',
        ]], json_decode(json_encode($db->table('tb_article')->where('id', $args['id'])->select()), true));
    }

    /**
     * @depends testUpdate
     */
    public function testSelectOne(array $args): void
    {
        $db = $this->getConnection();
        $this->assertEquals([
            'id'        => (int) $args['id'],
            'member_id' => 0,
            'title'     => 'title',
            'content'   => 'content-updated',
            'time'      => '2021-01-01 00:00:00',
        ], json_decode(json_encode($db->table('tb_article')->where('id', $args['id'])->select()->get()), true));
    }
}

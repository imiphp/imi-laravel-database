<?php

declare(strict_types=1);

namespace Imi\Laravel\Database\Test\Unit\Db;

use Illuminate\Support\Facades\DB;
use Imi\Laravel\Database\Contract\ConnectionInterface;
use PHPUnit\Framework\TestCase;

abstract class DbBaseTest extends TestCase
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
        $this->assertTrue($db->insert('insert into tb_article(title,content,time)values(?, ?, ?)', ['title', 'content', '2019-06-21']));
        $this->assertEquals(1, $db->getPdo()->lastInsertId());

        return ['id' => $db->getPdo()->lastInsertId()];
    }

    /**
     * @depends testInsert
     */
    public function testUpdate(array $args): array
    {
        $db = $this->getConnection();
        $this->assertEquals(1, $db->update('update tb_article set content = ?, time = ? where id = ?', ['content-updated', '2021-01-01 00:00:00', $args['id']]));

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
        ]], json_decode(json_encode($db->select('select * from tb_article where id = ?', [$args['id']])), true));
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
        ], json_decode(json_encode($db->selectOne('select * from tb_article where id = ?', [$args['id']])), true));
    }
}

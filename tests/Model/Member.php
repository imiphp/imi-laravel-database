<?php

declare(strict_types=1);

namespace Imi\Laravel\Database\Test\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * 该表将与模型关联。
     *
     * @var string
     */
    protected $table = 'tb_member';

    /**
     * 是否主动维护时间戳.
     *
     * @var bool
     */
    public $timestamps = false;
}

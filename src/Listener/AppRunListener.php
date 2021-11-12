<?php

declare(strict_types=1);

namespace Imi\Laravel\Database\Listener;

use Illuminate\Database\Eloquent\Model;
use Imi\App;
use Imi\Bean\Annotation\Listener;
use Imi\Event\EventParam;
use Imi\Event\IEventListener;

/**
 * @Listener(eventName="IMI.APP_RUN", priority=\Imi\Util\ImiPriority::IMI_MAX)
 */
class AppRunListener implements IEventListener
{
    /**
     * 事件处理方法.
     */
    public function handle(EventParam $e): void
    {
        Model::setConnectionResolver(App::getBean('LaravelConnectionResolver'));
    }
}

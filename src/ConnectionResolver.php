<?php

declare(strict_types=1);

namespace Imi\Laravel\Database;

use Imi\Bean\Annotation\Bean;
use Imi\Db\Db;
use Imi\Laravel\Database\Contract\ConnectionResolverInterface;

/**
 * @Bean("LaravelConnectionResolver")
 */
class ConnectionResolver implements ConnectionResolverInterface
{
    protected ?string $defaultConnection = null;

    /**
     * {@inheritDoc}
     */
    public function connection($name = null)
    {
        return new Connection(Db::getInstance($name ?? $this->defaultConnection)->getInstance());
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultConnection()
    {
        return $this->defaultConnection ?? Db::getDefaultPoolName();
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultConnection($name)
    {
        $this->defaultConnection = $name;
    }

    /**
     * @return mixed
     */
    public function __call(string $method, array $parameters)
    {
        return $this->connection()->$method(...$parameters);
    }
}

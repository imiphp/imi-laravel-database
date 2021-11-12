<?php

declare(strict_types=1);

namespace Imi\Laravel\Database;

use Illuminate\Database\MySqlConnection;
use Imi\Bean\Annotation\Bean;
use Imi\Db\Db;
use Imi\Laravel\Database\Contract\ConnectionResolverInterface;
use InvalidArgumentException;

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
        $instance = Db::getInstance($name ?? $this->defaultConnection);
        switch ($instance->getDbType())
        {
            case 'MySQL':
                return new MySqlConnection($instance->getInstance());
        }
        throw new InvalidArgumentException("Unsupported driver [{$instance->getDbType()}].");
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

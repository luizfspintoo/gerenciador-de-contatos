<?php

namespace Core;

use PDO;

class Database
{
    private $db;

    public function __construct($config)
    {
        $this->conexaoDatabase($config);
    }

    public function query($query, $class = null, $params = [])
    {
        $prepare = $this->db->prepare($query);
        if ($class) {
            $prepare->setFetchMode(PDO::FETCH_CLASS, $class);
        }
        $prepare->execute($params);

        return $prepare;
    }

    public function conexaoDatabase($config)
    {
        $driver = $config['driver'];
        unset($config['driver']);
        $dsn = $driver.':'.http_build_query($config, '', ';');

        if ($driver == 'sqlite') {
            $dsn = $driver.':'.$config['database'];
        }

        $this->db = new PDO($dsn);
    }
}

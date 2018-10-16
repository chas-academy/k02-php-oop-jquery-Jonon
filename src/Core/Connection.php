<?php

namespace TwitterClone\Core;

use \PDO;
use TwitterClone\Core\Config;
use TwitterClone\Utils\Singleton;

class Connection extends Singleton
{
    public $handler;
    protected function __construct()
    {
        try {
            $config = Config::getInstance()->get('db');
            $this->handler = new PDO(
                $config['dsn'],
                $config['user'],
                $config['password']
            );
            $this->handler->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
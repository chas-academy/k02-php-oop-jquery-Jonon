<?php

namespace TwitterClone\Models;

use TwitterClone\Core\Connection;

abstract class AbstractModel {
    protected $db;

    public function __construct() {
        $this->db = Connection::getInstance()->handler;
    }
}
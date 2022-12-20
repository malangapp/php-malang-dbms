<?php declare(strict_types=1);
namespace malang_dbms;
class ML_DBMS {
    protected array $_manager;
    public function __construct() {
        $this->_manager = array();
        return $this;
    }
    public function create_mysql_client(string $name, ML_Config $config) : self {
        $this->_manager[$name] = new ML_CLIENT_MySQL($config);
        return $this;
    }
    public function use_mysql_client(string $name) : ?ML_CLIENT_MySQL {
        if(isset($this->_manager[$name])) return $this->_manager[$name];
        return null;
    }
}
<?php declare(strict_types=1);
namespace malang_dbms;
use mysqli;
class ML_CLIENT_MySQL {
    protected mysqli $_client;
    protected ML_Config $_config;
    protected bool $_status = false;
    public function __construct(ML_Config $config){
        $this->_config = $config;
        return $this;
    }
    public function connect() : self {
        $this->_client = new mysqli(
            $this->_config->hostname,
            $this->_config->username,
            $this->_config->password,
            $this->_config->schema,
            $this->_config->port
        );
        $this->_status = false;
        if(!$this->_client->connect_error) {
            $this->_status = true;
            $this->_client->set_charset($this->_config->charset);
        }
        return $this;
    }
    public function close() : self {
        if($this->_status) $this->_client->close();
        return $this;
    }
    public function client() : ?mysqli {
        return $this->_status ? $this->_client : null;
    }
}
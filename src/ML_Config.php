<?php declare(strict_types=1);
namespace malang_dbms;
class ML_Config {
    public function __construct() {
        return $this;
    }
    public string $hostname = "localhost";
    public string $username = "";
    public string $password = "";
    public int $port = 3306;
    public string $schema = "";
    public string $charset = "utf8mb4";
}
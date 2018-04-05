<?php
class DatabaseIO
{
    public $hostname = 'localhost';
    public $username = 'root';
    public $password = '123456';
    public $database = 'webandonlineservice';
    public $connect = null;

    public function __construct()
    {
        $this->connect = new mysqli($this->hostname, $this->username, $this->password);
        if ($this->connect->connect_error) {
            echo "ERROR";
            $this->connect = null;
            return;
        }
        $this->connect->set_charset('utf8');
        $this->connect->select_db($this->database);
    }

    public function __destruct()
    {
        if ($this->connect != null) {
            $this->connect->close();
        }
    }

    public function query($query)
    {
        return $this->connect == null ? null : $this->connect->query($query);
    }
}

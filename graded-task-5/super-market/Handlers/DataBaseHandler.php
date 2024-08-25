<?php
class DataBaseHandler
{
    private static $connection;

    public function __construct($provider, $host, $dbname, $username, $password)
    {
        $info = $provider.':host='.$host.';dbname='.$dbname;
        $conn = new PDO($info,$username,$password);
        $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this::$connection = $conn;
    }

    public function get_connection()
    {
        return $this::$connection;
    }
}
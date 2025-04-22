<?php 
class connectDB{
    public $con;
    protected $server='192.168.43.133';
    protected $user='root';
    protected $pass='';
    protected $db='thuvien';
    function __construct()
    {
        $this->con=mysqli_connect($this->server,$this->user,$this->pass,$this->db);
        mysqli_query($this->con,"SET NAMES 'utf8'");
    }
}
?>
<?php
class Dbase {
    public $conn;
    public function __construct()
    {
    $this->conn=mysqli_connect("localhost","root","","firstdb");
    }
   
    public function close(){
       $this->conn= mysqli_close("localhost","root","","firstdb");
    }
    public function selectAll($table){
        $query="SELECT * FROM $table
    ORDER BY orderDate DESC
    ";
    $result=mysqli_query($this->conn,$query);
    $customers=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($customers);
    // print_r($customers);

    }
    public function selectColumns($table,$columns){
        $query="SELECT $columns FROM $table";
        $result=mysqli_query($this->conn,$query);
        $customers=mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo json_encode($customers); 
    }
};

$alaa=new Dbase();
// $alaa->selectAll("orders");
$alaa->selectColumns("customers","customerName");
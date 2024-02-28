<?php
class connection
{

    public function __construct()
    {

        try{
            $this-> con  = new PDO("mysql:host=localhost;dbname=bdmvc","root","");
            $this->con-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(Exception $e){

            echo "Error: ".$e->getMessage();
        }
    }

    public function getConnection()
    {
        
        return $this->con;
        
    }
}

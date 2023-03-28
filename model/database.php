<?php
require_once 'connect.php';
class Database extends Connect
{
    public function read($query)
    {
        $DB = $this->db_connect();
        return $stm = $DB->query($query);
    }
    // public function check($query)
    // {
    //     $DB = $this->db_connect();
    //     return $stm = $DB->query($query);
    // }
    public function write($query, $data = [])
    {
        $DB = $this->db_connect();
        $stm = $DB->prepare($query);

        if(count($data) == 0){
            $stm = $DB->query($query);
            $check = 0;
            if($stm){
                $check = 1;
            }
        } else {
            $check = $stm->execute($data);
        }
        if($check){
            return true;
        }else{
            return false;
        }
    }
}

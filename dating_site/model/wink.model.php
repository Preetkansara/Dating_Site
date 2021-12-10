<?php /** @noinspection PhpMultipleClassDeclarationsInspection */
include_once "Database.php";
class Wink extends database{
   
    public function selectWinks($uname){
        $sql="select * from  wink where remail=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$uname]);
        $results=$stmt->fetchAll();
        return $results;
    }
    public function setWink($uname,$fname){
        
        $sql="INSERT INTO `wink` (`semail`, `remail`)  values(?,?)";
        $stmt=$this->connect()->prepare($sql);
        $ans=$stmt->execute([$uname,$fname]);
        return $ans;
    }
    public function removewink($wid){
        
        $sql="DELETE FROM wink WHERE wid=?";
        $stmt=$this->connect()->prepare($sql);
        $ans=$stmt->execute([$wid]);
        return $ans;
    }
    
    
}
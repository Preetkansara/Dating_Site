<?php 
include_once "Database.php";
class User extends database{
    public $fname;
    public $lname;
    public $email;
    public $pwd;
    public $ulevel;
    public function __construct(){
    }
    public function defaultCon($fname,$lname,$email,$pwd,$ulevel){
        $this->fname=$fname;
        $this->lname=$lname;
        $this->email=$email;
        $this->pwd=$pwd;
        $this->ulevel=$ulevel;
    }
    public function selectAllUser($mail){
        $sql="select * from users where email!=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$mail]);

        $results=$stmt->fetchAll();
        return $results;
    }
    public function selectUser($mail){
        $sql="select * from users where email=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$mail]);

        $results=$stmt->fetchAll();
        return $results;
    }
    public function setUser($fname,$lname,$email,$pwd,$ulevel,$img){
        echo $img."this is the image";
        $sql="INSERT INTO `users` (`fname`, `lname`, `email`, `pwd`, `ulevel`,`img`)  values(?,?,?,?,?,?)";
        $stmt=$this->connect()->prepare($sql);
        $ans=$stmt->execute([$fname,$lname,$email,$pwd,$ulevel,$img]);
        return $ans;
        
    }
    public function updateuser($fname,$lname,$email,$pwd,$ulevel,$img,$uid){
        $sql="update users set fname=?,lname=?,email=?,pwd=?,ulevel=?,img=? where uid=?" ;
        $stmt=$this->connect()->prepare($sql);
        $ans=$stmt->execute([$fname,$lname,$email,$pwd,$ulevel,$img,$uid]);
        return $ans;
        
    }
    }
<?php 
class UsersContr extends User{
    public function createUser($fname,$lname,$email,$pwd,$ulevel){
        $this->setUser($fname,$lname,$email,$pwd,$ulevel);
    }
}
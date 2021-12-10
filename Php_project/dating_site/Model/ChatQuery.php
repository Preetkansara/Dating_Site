<?php
require ('../Model/Database.php');

class ChatQuery extends Database
{
    public function senderMessageList($userID, $personID) : array {
        $query = "select * from chat where sender_id = '$userID' and reciever_id = '$personID'";
        return $this->execute($query);
    }

    public function receiverMessageList($userID, $personID) : array {
        $query = "select * from chat where sender_id = '$personID' and  reciever_id = '$userID'";
        return $this->execute($query);
    }

    public function readMessages($userID, $personID) : array {
        $query = "update chat set status = 1 where reciever_id = '$userID' and sender_id = '$personID' ";
        return $this->execute($query);
    }
}
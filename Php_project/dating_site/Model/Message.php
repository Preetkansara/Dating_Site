<?php
require ('../Model/Database.php');

class Message extends Database
{
    public function sendMessage($sendMessage) : bool{
        $query = "INSERT INTO chat (sender_id, reciever_id, message, status) VALUES (:sender_id,:reciever_id,:message,:status)";
        $result = $this->message($query, $sendMessage);
        if (count($result) == 0) {
            return true;
        }
        return false;
    }
}
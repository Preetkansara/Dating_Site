<?php
require ('../Model/Message.php');
session_start();

$message = $_POST['message'];
$sender = $_SESSION['user_id'];
$receiver =  $_GET['person_id'];

$sendMessage = ['sender_id' => $sender,'receiver_id' => $receiver ,'message' => $message , 'status' => 0];

$messageObj = new Message();

if ($messageObj->sendMessage($sendMessage) == 1) {
    header("Location:../View/ChatBox.php?personID=$receiver");
}
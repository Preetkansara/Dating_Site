<?php
require('../Model/ChatQuery.php');
session_start();

function senderMessages($personID) :array
{
    $showMessageObj = new MessageOperations();
    return $showMessageObj->senderMessageList($_SESSION['userID'], $personID);
}

function receiverMessages($personID) : array
{
    $showMessageObj = new MessageOperations();
    return $showMessageObj->receiverMessageList($_SESSION['userID'], $personID);
}

function updateReadMessage($personID) : array
{
    $readMessage = new MessageOperations();
    return $readMessage->readMessages($_SESSION['userID'], $personID);
}

function viewReceiverProfile($ID): array
{
    $viewProfileObj = new MessageOperations();
    $result = $viewProfileObj->viewReceiverProfileList($ID);
    if($result == 'error'){
        header("Location:../View/Index.php");
        exit();
    }
    return $result;
}

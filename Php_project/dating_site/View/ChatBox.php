<?php
require('../Controller/showMessage.php');
$personID = $_GET['personID'];
$userID = $_SESSION['userID'];

$premiumUser = isset($_SESSION['PremiumUser']);

$receiverProfile = viewReceiverProfile($personID);

if (!isset($_SESSION['userID'])) {
    header("Location:../View/Index.php?error=notLogin");
    exit();
}

if (isset($_GET['personID'])) {

    $senderMessageDetails = senderMessages($personID);
    $receiverMessageDetails = receiverMessages($personID);

    $messages = array_merge($senderMessageDetails, $receiverMessageDetails);

    usort($messages, function ($firstItem, $secondItem) {
        $timeStamp1 = strtotime($firstItem['date_time']);
        $timeStamp2 = strtotime($secondItem['date_time']);
        return $timeStamp1 - $timeStamp2;
    });

    //update read message
    $updateReadMessages = updateReadMessage($personID);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | Dating </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="assets/CSS/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
          integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>

<body>
<div class="row justify-content-center">
    <div style="width: 600px;" class="">
        <?php foreach ($receiverProfile as $valueForViewProfile) { ?>
            <h1><?php echo $valueForViewProfile['firstName'] . ' ' . $valueForViewProfile['last_name'] ?></h1>

            <div style="width: 100%; height: 450px; overflow: auto;">
            <?php foreach ($messages as $message) { ?>
                <div class="d-flex flex-row <?php echo $message['senderID'] ==$userID ? "justify-content-end bg-blue  mb-4 pr-1" : "justify-content-start" ?> ">
                    <div>
                        <p class=" small p-2 ms-3 mb-1 rounded-3"
                    style="background-color: #f5f6f7;"> <?php echo $message['text'] ?></p>
                    <?php if ($premiumUser == 1 && $message['isRead'] == 1 && $message['senderID'] == $userID) { ?>
                        <i class="fas fa-check-double"></i> <?php } ?>
                </div>
                </div>
            <?php }
        } ?>
    </div>
    <div style="bottom: 0; overflow: hidden; width: 100%; margin: 20px;">
        <form action="../Controller/messageBox.php?personID=<?php echo $personID; ?>" method="post">
            <input type="text" name="message" style="width: 90%;">
            <input type="submit" name="submit" value="Send">
        </form>
    </div>
</div>
</div>

</body>

</html>

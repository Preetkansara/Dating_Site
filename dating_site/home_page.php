<?php
session_start();
require_once 'server.php';
if(!isset($_SESSION['username'])){
    header("location: login.php");
}
?>
<head>
    <style>
        .header {
            width: 30%;
            margin: 50px auto 0px;
            color: white;
            background: #8490FC;
            text-align: center;
            border: 1px solid #B0C4DE;
            border-bottom: none;
            border-radius: 10px 10px 0px 0px;
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <section class="users">
        <header class="header">
            <div class="content">
                <?php
                $sql = "SELECT * FROM users WHERE username = {$_SESSION['username']}";
                $result = mysqli_query($db, $sql);
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <img src="images/dating.png" height="100" width="100" alt="">
                <div class="details">
                    <span><?php echo $row['username']?></span>
                    <p><?php echo $row['status']; ?></p>
                </div>
            </div>
            <a href="php/logout.php?logout_id=<?php echo $row['username']; ?>" class="logout">Logout</a>
        </header>
        <div class="search">
            <span class="text">Search your Partner</span>
            <input type="text" placeholder="Enter name to search...">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="users-list">

        </div>
    </section>
</div>
</body>
</html>

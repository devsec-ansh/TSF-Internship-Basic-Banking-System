<?php
    include_once 'connect.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Professors</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Potta+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Stalinist+One&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
            require("navbar.php");
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 top-box">NAME</div>
                <div class="col-lg-4 top-box">EMAIL ID</div>
                <div class="col-lg-4 top-box">BALANCE</div>
                <br>
                <hr>
            </div>
            <?php
                $sql = "SELECT * FROM users;";
                $result = mysqli_query($conn, $sql);
                $result_check = mysqli_num_rows($result);
                
                while($row = mysqli_fetch_array($result))
                {?>
                    <div class="row">
                        <div class="col-lg-4 table-con"><?php echo $row['name']?></div>
                        <div class="col-lg-4 table-con"><?php echo $row['email']?></div>
                        <div class="col-lg-4 table-con"><?php echo $row['balance']?></div>
                        <br>
                        <hr>
                    </div>
                <?php
                }
                ?>
        </div>
        
       
        <?php
            require("footer.php");
        ?>
    </body>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</html>

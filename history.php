<?php
    include_once 'connect.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Past</title>
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
                <div class="col-lg-3 top-box">FROM</div>
                <div class="col-lg-3 top-box">AMOUNT</div>
                <div class="col-lg-3 top-box">TO</div>
                <div class="col-lg-3 top-box">TIMESTAMP</div>
                <br>
                <hr>
            </div>
            <?php
                $sql = "SELECT * FROM history;";
                $result = mysqli_query($conn, $sql);
                $result_check = mysqli_num_rows($result);
                
                while($row = mysqli_fetch_array($result))
                {?>
                    <div class="row">
                        <div class="col-lg-3 table-con"><?php echo $row['sender']?></div>
                        <div class="col-lg-3 table-con"><?php echo $row['amount']?></div>
                        <div class="col-lg-3 table-con"><?php echo $row['receiver']?></div>
                        <div class="col-lg-3 table-con"><?php echo $row['timestamp']?></div>
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

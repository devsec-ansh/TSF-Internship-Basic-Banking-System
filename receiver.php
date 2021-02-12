<?php
    include 'connect.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Trasaction</title>
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
        <?php
            $sender_id= $_GET['id'];
            $sender="SELECT * FROM users where id=$sender_id;";
            $result=mysqli_query($conn, $sender);
            if(!$result){
                echo "Error : ".$sender."<br>".mysqli_error($conn);
            }
            $row= mysqli_fetch_assoc($result);
        ?>
        
        
        
        <form method="post" name="tcredit" class="tabletext" >
            <h2 class="text-center from">SEND FROM</h2>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 top-box">NAME</div>
                    <div class="col-lg-4 top-box">EMAIL ID</div>
                    <div class="col-lg-4 top-box">BALANCE</div>

                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4 table-con send-det"><?php echo $row['name']?></div>
                    <div class="col-lg-4 table-con send-det"><?php echo $row['email']?></div>
                    <div class="col-lg-4 table-con send-det"><?php echo $row['balance']?></div>
                    <hr>
                </div>




                <hr>
                <h2 class="text-center from">SEND TO</h2>
                <select name="to" class="form-control" required id="selection">
                    <option value="" disabled selected>Choose</option>
                    <?php
                        $sql = "SELECT * FROM users where id!=$sender_id";
                        $result=mysqli_query($conn,$sql);
                        if(!$result)
                        {
                            echo "Error ".$sql."<br>".mysqli_error($conn);
                        }
                        while($rows = mysqli_fetch_assoc($result)) {
                    ?>
                        <option class="table" value="<?php echo $rows['id'];?>" >
                            <?php echo $rows['name'] ;?> [ Balance: 
                            <?php echo $rows['balance'] ;?> ]
                    </option>
                    <?php 
                        } 
                    ?>
                </select>
                <hr>
            </div>







            <h2 class="text-center from">SELECT AMOUNT</h2>
            <div class="container" id="amnt">
                <input id="input-style" type="number" class="form-control" name="amount" required>   
                <br><br>
                <div class="text-center" >
                    <button class="mt-3" name="submit" type="submit" id="myBtn">TRANSFER</button>
                </div>
                <br>
            </div>
        </form>
        
        
        <!------------------------inserting in database------------------------>
        <?php
        if(isset($_POST['submit']))
        {
            $from = $_GET['id'];
            $to = $_POST['to'];
            $amount = $_POST['amount'];

            $sql = "SELECT * from users where id=$from";
            $query = mysqli_query($conn,$sql);
            $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

            $sql = "SELECT * from users where id=$to";
            $query = mysqli_query($conn,$sql);
            $sql2 = mysqli_fetch_array($query);



            // constraint to check input of negative value by user
            if (($amount)<0)
           {
                echo '<div class="alert alert-danger container text-center">';
                echo '<strong>Warning!</strong> Inavlid Value.';
                echo '</div>';
            }

            // constraint to check insufficient balance.
            else if($amount > $sql1['balance']){
                echo '<div class="alert alert-danger container text-center">';
                echo '<strong>Warning!</strong> Insufficient Balance.';
                echo '</div>';
            }

            // constraint to check zero values
            else if($amount == 0){
                echo '<div class="alert alert-danger container text-center">';
                echo '<strong>Warning!</strong> Invalid Value.';
                echo '</div>';
             }


            else{
                // deducting amount from sender's account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);


                // adding amount to reciever's account
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);

                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO history(`sender`, `amount`, `receiver`) VALUES ('$sender','$amount', '$receiver')";
                $query=mysqli_query($conn,$sql);

                if($query){
                    echo '<div class="alert alert-success container text-center">';
                    echo '<strong>Success!</strong>Transaction Successful.';
                    echo '</div>';

                }

                    $newbalance= 0;
                    $amount =0;
            }

        }
        ?>
        
        
        
        <?php
            require("footer.php");
        ?>
    </body>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</html>

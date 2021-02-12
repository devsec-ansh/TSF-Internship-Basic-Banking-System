<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome to The Heist</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Potta+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
            require("navbar.php");
        ?>
        
        <div class="container" id="main-content">
                <div class="jumbotron visible-lg" id="img">
                    <div class="text-center quote">
                        <span>“If you want to be wealthy, think of saving as well as getting.” -Ben Franklin</span>
                    </div>
		</div>
		<div id="home-tiles" class="row">
			<div class="col-md-4 col-sm-6 col-xs-12">
				<a href="users.php">
					<div  class="tiles" id="users">
						<span>USERS</span>
					</div>
				</a>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="transaction.php">
					<div class="tiles" id="transfer">
						<span>TRANSFER</span>
					</div>
				</a>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<a href="history.php"> 
					<div  class="tiles" id="history">
						<span>HISTORY</span>
					</div>
				</a>
			</div>
		</div>
	</div>
        
        
        
        
        
        <?php
            require("footer.php");
        ?>
    </body>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</html>

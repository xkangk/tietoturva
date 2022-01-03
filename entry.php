<?php  
 //entry.php  
 session_start();  
 if(!isset($_SESSION["username"]))  
 {  
      header("location:index.php?action=login");  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Kirjautuminen</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <link rel="stylesheet" href="tyyli.css" />  

           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div id="box">  
                <h3></h3>  
                <br />  
                <?php  
                echo '<h1>Tervetuloa - '.$_SESSION["username"].'</h1>';  
                echo '<label><a href="logout.php">Kirjaudu ulos</a></label>';  
                ?>  
           </div>  
      </body>  
 </html> 
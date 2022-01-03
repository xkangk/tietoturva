<?php  
 $connect = mysqli_connect("localhost", "root", "", "n0jaka000");  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      header("location:entry.php");  
 }  
 if(isset($_POST["register"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Molemmat kentät tulee täyttää !")</script>';  
      }  
      else  
      {  
           $username = filter_var($_POST["username"],FILTER_SANITIZE_STRING);  
           $password = filter_var($_POST["password"],FILTER_SANITIZE_STRING);  
           $password = password_hash($password, PASSWORD_DEFAULT);  
           $query = "INSERT INTO kayttaja(username, password) VALUES('$username', '$password')";  
           if(mysqli_query($connect, $query))  
           {  
                echo '<script>alert("Rekisteröinti onnistui!")</script>';  
           }  
      }  
 }  
 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Molemmat kentät tulee täyttää !")</script>';  
      }  
      else  
      {  
           $username = filter_var($_POST["username"],FILTER_SANITIZE_STRING);  
           $password = filter_var($_POST["password"],FILTER_SANITIZE_STRING);  
           $query = "SELECT * FROM kayttaja WHERE username = '$username'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($password, $row["password"]))  
                     {  
                          //return true;  
                          $_SESSION["username"] = $username;  
                          header("location:entry.php");  
                     }  
                     else  
                     {  
                          //return false;  
                          echo '<script>alert("Wrong User Details")</script>';  
                     }  
                }  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Kirjaudu sisään</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
		   <link rel="stylesheet" href="tyyli.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div id="box">  

                <?php  
                if(isset($_GET["action"]) == "login")  
                {  
                ?>  
                <div style="font-size: 20px;margin: 10px;color: white;">Kirjaudu sisään</div>  
                <br />  
                <form method="post">  
                     <label>Käyttäjätunnus</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Salasana</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" value="Kirjaudu sisään" class="btn btn-info" />  
                     <br />  
                     <p>Etkö ole käyttäjä? <a href="index.php">Rekisteröidy</a></p>  
                </form>  
                <?php       
                }  
                else  
                {  
                ?>  
                <div style="font-size: 20px;margin: 10px;color: white;">Rekisteröidy</div>  
                <br />  
                <form method="post">  
                     <label>Käyttäjätunnus</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Salasana</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="register" value="Rekisteröidy" class="btn btn-info" />  
                     <br />  
                     <p>Oletko jo käyttäjä? <a href="index.php?action=login">Kirjaudu sisään</a></p>  
                </form>  
                <?php  
                }  
                ?>  
           </div>  
      </body>  
 </html>
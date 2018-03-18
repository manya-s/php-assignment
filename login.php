<!doctype html>
<html>
<head>
<title> Login Page</title>
<style>
.form{
        display:flex;
                      flex-direction:column;
                            align-items:center;
}
.xy{
      margin:20px;
}
.options{
           display:flex;
                            flex-direction:column;
                                     align-items:center;
                                              background-color:#cbabc1;
}

</style>

</head>
<body>


<div class= "form">
<h1> LOGIN FORM </h1>
<form id='login' action="" method= "post">
  
   <div class="xy">
   Username: <input type='text' name='username' id='username' required>
   </div><span id="para"></span>
                       
   <div class="xy">
    Password: <input type='password' name='password' id= 'password' required>
   </div>
                                           
   <div class="xy">
   <button type='submit'> LOGIN</button>
   </div>
                                                               
   <div class="xy">
   <input type='checkbox' checked='checked' name='remember'>Remember me            </div>
                                                                                   </div>
                                                                                   </form>



<?php
$db = mysqli_connect('192.168.121.187','first_year','first_year','first_year_db');
  $servername = "192.168.121.187";
     $usernameDB ="first_year";
         $passwordDB = "first_year";
              $dbname="first_year_db";
                    // Create connection
                    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);
                           // Check connection
                           if ($conn->connect_error) {
                                             die("Connection failed: " . $conn->connect_error);
                           }
 session_start();                                           
 if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT name FROM manya_user WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
              //session_register("myusername");
              $_SESSION['login_user'] = $myusername;
              
              header("location: welcome.php");
           }else {
                   $error = "Your Login Name or Password is invalid";
                   echo "your login name or password is invalid";
                }
   } 
?>
  </body>
</html>

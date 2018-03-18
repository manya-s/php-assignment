<!doctype html>
<html>
<head>
</head>
<body>
<?php
$q=$_GET['q'];

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

                           

    $sql=" SELECT name FROM manya_user WHERE username='".$q."' ";
     
     $result=mysqli_query($db,$sql);
     $row = mysqli_fetch_array($result, MYSQL_ASSOC);
      $count = mysqli_num_rows($result);

      if($count>0)
         {
             echo "User Name Already Exist";
              }
       else
          {
              echo "OK";
               }       
print_r($q);
?>

</head>
  </html>

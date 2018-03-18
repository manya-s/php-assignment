<!doctype html>
<html>
   
   <head>
         <title>Welcome </title>
            </head>
               
               <body>
               <?php
               $db =mysqli_connect('192.168.121.187','first_year','first_year','first_year_db');
                       $servername = "192.168.121.187";                                    
                            $usernameDB ="first_year";                     
                            $passwordDB = "first_year";     
                            $dbname="first_year_db"; 
                
               session_start();
               
               $user_check = $_SESSION['login_user'];
               $ses_sql = mysqli_query($db,"select username from manya_user where username = '$user_check' ");
                  
                  $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
                     
                     $login_session = $row['username'];
                        
                        if(!isset($_SESSION['login_user'])){
                                header("location:login.php");
                                   }
?>
   
                     <h1>Welcome <?php echo $login_session; ?></h1> 
                     <div class="main-body">
               <div><img src=      
                     </div>
                     
                     
                     <h2><a href = "logout.php">Sign Out</a></h2>
                              </body>
                                 
                              </html>

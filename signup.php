<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
.body{
        display:flex;
        flex-direction:column;
        justify-content:center;
        
        
}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $usernameErr = "";
$name = $email = $gender = $mobile = $mobileErr = $username= $passErr= $password= $cnfmpassErr= $confirmpass="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
          $nameErr = "Name is required";
            } else {
                  $name = test_input($_POST["name"]);
                      // check if name only contains letters and whitespace
                      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                              $nameErr = "Only letters and white space allowed";
                                  }
                        }
      
      if (empty($_POST["email"])) {
            $emailErr = "Email is required";
              } else {
                    $email = test_input($_POST["email"]);
                        // check if e-mail address is well-formed
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                $emailErr = "Invalid email format";
                                    }
                          }
          
        if (empty($_POST["username"])) {
              $usernamErre = "Username is required";
                } else {
                      $username = test_input($_POST["username"]);
                          // check if username is valid/
                          if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
                                  $usernameErr = "Invalid Userame, can only contain alphabets and numbers.";
                                      }
                            }
         if (empty($_POST["password"])){
           $passErr="Password required";
         }else{
            $password= test_input($_POST["password"]);
            //check if password is valid/
            if (!preg_match("/.{8,}/",$password)){
            $passErr="password must contain atleast 8 digits.";
            }
         }

        if (empty($_POST["confirmpass"])){
          $cnfmpassErr="confirm password";
        }else{
          $confirmpass=test_input($_POST["confirmpass"]);
          //check if passwords match/
          if($password != $confirmpass){
            $cnfmpassErr="Passwords do not match";
          }
        }

          if (empty($_POST["mobile"])) {
                $mobileErr = "mobile number is required";
                  } else {
                        $mobile = test_input($_POST["mobile"]);
                        //check if mobile number is valid/
                        if (!preg_match("/^\d{10}$/",$mobile)){
                          $mobileErr="Invalid number, must contain 10 digits.";
                        }
                          }

            if (empty($_POST["gender"])) {
                  $genderErr = "Gender is required";
                    } else {
                          $gender = test_input($_POST["gender"]);
                            }
}

function test_input($data) {
    $data = trim($data);
      $data = stripslashes($data);
        $data = htmlspecialchars($data);
          return $data;
}
?>


<div class="body">
<div><h2>SIGN UP</h2></div>
<div><p><span class="error">* required field.</span></p></div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 <div> Name: <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span>
      <br><br></div>
        <div>E-mail: <input type="text" name="email" value="<?php echo $email;?>">
          <span class="error">* <?php echo $emailErr;?></span>
            <br><br></div>
              <div>Username:<input type="text" name="username" value="<?php echo $username;?>">
                <span class="error">*<?php echo $usernameErr;?></span>
                  <br><br></div>
                  <div> Password:<input type="password" name="password" value="<?php echo $password;?>">
                  <span class="error">*<?php echo $passErr;?></span>
                  <br><br></div>
                  <div>Confirm Password:<input type="password" name="confirmpass" value="<?php echo $confirmpass;?>">
                  <span class="error">*<?php echo $cnfmpassErr;?></span>
                  <br><br></div>
                    <div>Mobile number: <input type= "text" name="mobile" value="<?php echo $mobile;?>">
                     <span class="error">*<?php echo $mobileErr;?></span>
                      <br><br></div>
                        <div>Gender:
                          <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
                            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
                              <span class="error"> <?php echo $genderErr;?></span>
                                <br><br></div>
                                 <div> <input type="submit" name="submit" value="Submit"></div>
                                  
                                  </form>
</div>                                  
</body>

 <?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// sql to create datbase/
$sql= "insert into manya_user(username, name, email, password, mobile_number)
values ('$username','$name','$email','$password','$mobile')";


if ($conn->query($sql)=== true){
    echo "Congratulations! You are now signed in.";
}else{
    echo "Error during signin".$conn->error;
}

}

$conn->close();
?> 


</html>


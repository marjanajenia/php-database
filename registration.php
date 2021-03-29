<!DOCTYPE html>
<html>
    <head>
        <title>Registration Form</title>
    </head>
    <body>
        <?php

            $firstname = $lastname = $gender = $email = $username = $password = $remail ="";
            $firstnameerr = $lastnameerr= $gendererr = $emailerr = $usernameerr = $passworderr = $rec_emailerr = $notavailable = "";

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                if(empty($_POST['fname'])) {
                    $firstnameerr = "Please Fill up the firstname!";
                }

                else if(empty($_POST['lname'])) {                    
                    $lastnameerr = "Please Fill up the lastname!";
                    
                }

                else if(empty($_POST['gender'])) {                    
                    $gendererr = "Please Fill up the gender!";
                    
                }

                else if(empty($_POST['email'])) {                    
                    $emailerr = "Please Fill up the email!";
                    
                }

                else if(empty($_POST['username'])) {                    
                    $usernameerr = "Please Fill up the username!";
                }

                else if(empty($_POST['password'])) {                    
                    $passworderr = "Please Fill up the password!";
                }

                else if(empty($_POST['remail'])) {                    
                    $rec_emailerr = "Please Fill up the recovery email!";
                }

                else {

                    $firstname = $_POST['fname'];
                    $lastname = $_POST['lname'];
                    $gender = $_POST['gender'];
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $remail = $_POST['remail'];
        

                   $host="localhost";
                   $dusername="task";
                   $dpassword="123";
                   $dbname="task1";

                   $conn=new mysqli($host,$dusername,$dpassword,$dbname);

                   if(mysqli_connect_error()){
                    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From registration Where email = ? Limit 1";
     $INSERT = "INSERT Into registration (fname, lname, gender, email, username, password, remail) values(?, ?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssssss", $fname, $lname, $gender, $email, $username, $password, $remail);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
                   }

                            

                    
                            }
                        
                    
            
        ?>

        <h1>Registration Form</h1>
        <form  action=" " method="POST">

            <fieldset>
                <legend><b>Basic Information:</b></legend>
            
                <label for="fname">First Name:</label>
                <input type="text" name="fname" id="fname">
                <?php echo $firstnameerr; ?>

                <br>

                <label for="lname"> LastName:</label>
                <input type="text" name="lname" id="lname">
                <?php echo $lastnameerr; ?>

                <br>

                <label for="gender">Gender:  </label>
                <input type="radio" name="gender" id="male" value="male">  
                <label for="gender">Male </label>
                <input type="radio" name="gender" id="female" value="female">
                <label for="gender">Female </label>
                <input type="radio" name="gender" id="other" value="other">
                <label for="gender">Other </label>
                <?php echo $gendererr; ?>

                <br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <?php echo $emailerr; ?>

            </fieldset>

            <fieldset>
                <legend><b>Account Information:</b></legend>

                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
                <?php echo $usernameerr; echo $notavailable; ?>

                <br>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
                <?php echo $passworderr; ?>

                <br>

                <label for="remail">Recovery email:</label>
                <input type="email" id="remail" name="remail">
                <?php echo $rec_emailerr; ?>
                
                </fieldset>

            <input type="submit" value="Submit" > 
        </form>
        
    </body>
</html>



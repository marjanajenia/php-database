<!DOCTYPE html>
<html>
    <head>
        <title>Login Form</title>
    </head>
    <body>
        <?php

            $username = $password ="";
            $usernameerr = $passworderr ="";

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                if(empty($_POST['username'])) {                    
                    $usernameerr = "Please Fill up the Username!";
                }

                else if(empty($_POST['password'])) {                    
                    $passworderr = "Please Fill up the password!";
                }

                else {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    
                }
            }
        ?>
        
        <h1>Login Form</h1>
        <form  action="" method="POST">

            <fieldset>
                <legend><b>Login</b></legend>
            
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
                <?php echo $usernameerr; ?>

                <br>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
                <?php echo $passworderr; ?>
                
                </fieldset>

            <input type="submit" value="Login"> 
        </form>
        
    </body>
</html>
<?php
    session_start();

    //include "navigation.php";

    require "config.php";

    $email= $password = $firstname = "";
    $email_err = $password_err = "";

    if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["login"]))){
        $remember= $_POST['remember'];
        //echo $remember;

        $email=$_POST['email'];
        $password=$_POST['password'];

        if(empty($email)){
            $email_err = "Please enter the Username.<br>";
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_err = "Invalid Email Format.";
        }
        if(empty($password)){
            $password_err = "Please enter the password.<br>";
        }

        if(empty($email_err) && empty($password_err)){
            // Prepare a select statement
            $query = "SELECT * FROM users WHERE email = '$email' ";

            $res = mysqli_query($link, $query);

            $row = mysqli_fetch_array($res);
            //$active = $row['active'];
            if(!empty($_POST["remember"])){
                setcookie("email", $_POST["email"], time() + 3600);
                setcookie("password", $_POST["password"], time() + 3600);
                echo "Cookies set successfully";
            }else{
                setcookie("email", "");
                setcookie("password", "");
                //echo mysqli_error($link);
                echo "Cookies not set";
            }

            $id = $row['id'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $birthday = $row['birthday'];
            $reg_time = $row['reg_time'];

            $count = mysqli_num_rows($res);
            
            // check if user exists or not, if yes then check password
            if($count == 1){
                $query = "SELECT id, email, password FROM users WHERE password = '$password'";

                $result = mysqli_query($link, $query);
                $check = mysqli_fetch_array($result);
                
                // check if password is correct, if yes then start a new session 
                if(isset($check)){
                    //$id = $check['id'];
                    
                    session_start();

                    
                            
                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $id;
                    $_SESSION["email"] = $email; 
                    $_SESSION["username"] = $firstname;   
                    $_SESSION["lastname"] = $lastname;
                    $_SESSION["birthday"] = $birthday;
                    $_SESSION["reg_time"] = $reg_time;    
                
                    // Redirect user to welcome page
                    header("location: dashboard.php");
                }
                else{
                    // Password is not valid, display a generic error message
                    $login_err = "Invalid username or password.";
                    echo mysqli_error($link);
                }
                
                
            } else{
                $login_err = "User doesn't exist, Sign Up to login.";
            }
        }
        
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <?php include "navigation.php"; ?>
    <br>
    <br>
    <br>
    <div class="wrapper form-control card align-items-center">
        <?php if(isset($_POST["email"])) {echo $email;} ?>
        <h2><legend>Sign IN</legend></h2>
        <p class="base">Please fill in your credentials to login.</p>
        <br>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <span><?php echo "<em>".$login_err."</em>"; ?></span>

            <div class="form-group">
                <label for="email">Username</label>
                <input type="email" name="email" id="email" value="<?php if(isset($_COOKIE["email"])) {echo $_COOKIE["email"];}?>" class="input-field">
                <span>
                    <?php echo "<em>".$email_err."</em>"; ?>
                </span>
            </div>
            <br>
            <div class="form-group">
                <label for="password">Password</label>
                
                <input type="password" name="password" id="password" value="<?php if(isset($_COOKIE["password"])) {echo $_COOKIE["password"];}?>" class="input-field">
                <span><?php echo "<em>".$password_err."</em>"; ?></span>
            </div>
            <br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" checked>
                <label class="form-check-label" for="remember">Remember me.</label>
            </div>
            <p>Don't have an account? <a href="register.php"> Sign up now</a>.</p>
            <button type="submit" class="btn btn-primary" name="login">Login</button>

        </form>
    </div>
</body>
</html>
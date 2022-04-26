<?php
session_start();

// include config file
//require "config.php";

//declaring varibales
$email = $password = $firstname = $lastname = "";
$email_err = $password_err = $firstname_err = $lastname_err = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["register"]))) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $birthday = date('y-m-d', strtotime($_POST["birthday"]));
    $password = $_POST["password"];

    $query = "INSERT INTO users (firstname, lastname, email, birthday, password) 
                VALUES ('$firstname', '$lastname', '$email', '$birthday', '$password')";


    //run the querry
    $res = mysqli_query($link, $query);

    if ($res) {
        header("location: login.php");
    } else {
        echo mysqli_error($link);
    }
}

/*if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["register"]))){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        //$email = $_POST['email'];
        $birthday = $_POST['birthday'];
        $password = $_POST['password'];
        
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                //store result
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email id is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        $sql = "INSERT INTO users (firstname, lastname, email, birthday, password) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_firstname, $param_lastname, $param_email, $param_birthday, $param_password);
            
            // Set parameters
            $param_firstname = $fisrtname;
            $param_lastname = $lastname;
            $param_email = $email;
            $param_birthday = $birthday;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo(mysqli_error($link)) . '<br>';
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }*/

//}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
</head>

<body>
    <?php include "navigation.php"; ?>
    <br>
    <br>
    <br>
    <?php
    if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["register"]))) {
    }
    ?>

    <div class="wrapper card form-control ">
        <h2>
            <legend>Register</legend>
        </h2>
        <p class="base">Create your account. It's free and only takes a minute</p>
        <br>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <div class="form-group">
                <label for="">Firstname</label>
                <input type="text" name="firstname" required>
            </div>
            <br>
            <div class="form-group">
                <label for="">Lastname</label>
                <input type="text" name="lastname" required>
            </div>
            <br>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <br>
            <div class="form-group">
                <label for="">Birthday</label>
                <input type="date" name="bithday" id="birthday" required>
            </div>
            <br>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <br>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
            <button type="submit" class="btn btn-primary" name="register">Register</button>

        </form>
    </div>
</body>

</html>
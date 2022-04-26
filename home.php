<?php
session_start();

//include "navigation.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>

<body>
    <?php include "navigation.php"; ?>
    <br>
    <br>
    <br>
    <h2 class="align-items-center">About Me</h2>
    <br>

    <p class="card m-4 p-4">
        <?php
        if (($_SESSION['loggedin'] !== true) || (!isset($_SESSION['loggedin'])) || (!isset($_POST['save']))) {
            $show_about_me = "Hi!, I'm Sumit Kumar and also a Computer Science Engeneering student at Bennett Univesity. I love reading books based on legends/mythology and also fond of watching Tv series. ";
            echo $show_about_me;
        }
        else{
            echo "Hi!, I'm ".$_SESSION["name"]. " and also a ".$_SESSION["branch"]. " student at ".$_SESSION["institute"]. ".";
        }
        ?>
    </p>

    <!-- <p class="card m-4 p-4">Hi!, I'm <?php echo $_SESSION["name"]; ?> and also a <?php echo $_SESSION["branch"]; ?> student at <?php echo $_SESSION["institute"]; ?>.-->


    </p>
</body>

</html>
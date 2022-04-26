<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Academics</title>
</head>

<body>
    <?php include "navigation.php"; ?>
    <br>
    <br>
    <br>
    <h2 class="align-items-center">Academics</h2>
    <br>
    <div class="card mb-3">
        <img src="bennett.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_SESSION['institute']; ?></h5>
            <p class="card-text">I'm currently pursuing <?php echo $_SESSION['grad_course'] . "(" . $_SESSION['grad_year'] . ")"; ?> degree in <?php echo $_SESSION['branch']; ?>. </p>
            <p class="card-text">My Grades: <?php echo $_SESSION['grade']; ?></p>
        </div>
    </div>

    <div class="card mb-3">

        <img src="Sr_Sec_high_school.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_SESSION['institute2']; ?></h5>
            <p class="card-text">I have completed my <?php echo $_SESSION['course2'] . "(" . $_SESSION['board2'] . ")"; ?> from the <?php echo $_SESSION['institute2']; ?> in <?php echo $_SESSION['year2']; ?>. </p>
            <p class="card-text">My Grades: <?php echo $_SESSION['score2']; ?></p>
        </div>
    </div>

    <div class="card mb-3">
        <img src="high_school.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_SESSION['institute3']; ?></h5>
            <p class="card-text">I have completed my <?php echo $_SESSION['course'] . "(" . $_SESSION['board'] . ")"; ?> from the <?php echo $_SESSION['institute3']; ?> in <?php echo $_SESSION['year']; ?>. </p>
            <p class="card-text">My Grades: <?php echo $_SESSION['score']; ?></p>
        </div>
    </div>


</body>

</html>
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
    <h2 class="align-items-center">Technical Skills</h2>
    <br>


    <div class="card text-white bg-secondary mb-3 mx-auto" style="max-width: 24rem;">
        <div class="card-header">Hard skills</div>
        <div class="card-body">
            <ul class="card-text">
                <li><?php echo $_SESSION['hard_skills']; ?></li>
            </ul>
        </div>
    </div>
    <div class="card text-white bg-secondary mb-3 mx-auto" style="max-width: 24rem;">
        <div class="card-header">Soft skills</div>
        <div class="card-body">
            <ul class="card-text">
                <li><?php echo $_SESSION['soft_skills']; ?></li>
            </ul>
        </div>
    </div>
    <div class="card text-white bg-secondary mb-3 mx-auto" style="max-width: 24rem;">
        <div class="card-header">Projects</div>
        <div class="card-body">
            <ul class="card-text">
                <li><?php echo $_SESSION['projects']; ?></li>
            </ul>
        </div>
    </div>

    <div class="card text-white bg-secondary mb-3 mx-auto" style="max-width: 24rem;">
        <div class="card-header">Working Experience</div>
        <div class="card-body">
            <ul class="card-text">
                <li><?php echo $_SESSION['experience']; ?></li>
            </ul>
        </div>
    </div>



</body>

</html>
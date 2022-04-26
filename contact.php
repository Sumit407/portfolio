<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}


if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["submit"]))) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $country = $_POST['country'];
    $subject = $_POST['subject'];

    if ((!empty($fname)) && (!empty($lname)) && (!empty($country)) && (!empty($subject))) {
        //store the data in session variables
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['country'] = $country;
        $_SESSION['subject'] = $subject;

        $success = "Form submitted!  We'll contact you shortly.";
    } else {
        $err = "Please fill out the required fields.";
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

    <link rel="stylesheet" href="contact.css">
    <title>Contact Form</title>
</head>

<body>

    <?php include "navigation.php"; ?>
    <br>
    <br>
    <br>
    <h2 class="align-items-center">Contact Form</h2>
    <br>
    <div class="alert alert-danger" role="alert">
        <?php echo $err; ?>
    </div>
    <div class="alert alert-success" role="alert">
        <?php
        echo $success;
        ?>
    </div>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Your name..">
            <br>
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lastname" placeholder="Your last name..">
            <br>
            <label for="country">Country</label>
            <select id="country" name="country">
                <option value="India">India</option>
                <option value="Russia">Russia</option>
                <option value="USA">USA</option>
                <option value="other">other</option>
            </select>
            <br>
            <label for="subject">Subject</label>
            <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>

</html>
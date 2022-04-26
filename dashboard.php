<?php
session_start();

//include "navigation.php";
//require "config.php";
//echo $_COOKIE["email"];
//echo $_COOKIE["password"];


// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["save"]))) {
    // ---------- Personal details variables --------------------
    $name = $_POST['name'];
    $email = $_POST['email'];
    $linkedin = $_POST['linkedin'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gemder'];
    $hobby = $_POST['hobby'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];

    if ((!empty($name)) && (!empty($email)) && (!empty($mobile)) && (!empty($city)) && (!empty($state))) {
        //store the data in session variables
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['linkedin'] = $linkedin;
        $_SESSION['mobile'] = $mobile;
        $_SESSION['gender'] = $gender;
        $_SESSION['hobby'] = $hobby;
        $_SESSION['address'] = $address;
        $_SESSION['city'] = $city;
        $_SESSION['state'] = $state;
    } else {
        $save_err = "Please fill out the required fields.";
    }

    // ---------------------Academic details variables -----------------------
    $grad_course = $_POST['grad_course'];
    $branch = $_POST['branch'];
    $institute = $_POST['institute'];
    $grade = $_POST['grade'];
    $grad_year = $_POST['grad_year'];
    // ----- class 12 details -----
    $course2 = $_POST['course2'];
    $board2 = $_POST['board2'];
    $institute2 = $_POST['institute2'];
    $score2 = $_POST['score2'];
    $year2 = $_POST['year2'];
    // ------class 10 details------
    $course = $_POST['course'];
    $board = $_POST['board'];
    $institute3 = $_POST['institute3'];
    $score = $_POST['score'];
    $year = $_POST['year'];


    if ((!empty($grad_course)) && (!empty($branch)) && (!empty($institute)) && (!empty($grade))) {
        //store the data in session variables
        $_SESSION['grad_course'] = $grad_course;
        $_SESSION['branch'] = $branch;
        $_SESSION['grade'] = $grade;
        $_SESSION['grad_year'] = $grad_year;
        $_SESSION['institute'] = $institute;
        $_SESSION['hobby'] = $hobby;

        $_SESSION['course2'] = $course2;
        $_SESSION['board2'] = $board2;
        $_SESSION['institute2'] = $institute2;
        $_SESSION['score2'] = $score2;
        $_SESSION['year2'] = $year2;

        $_SESSION['course'] = $course;
        $_SESSION['board'] = $board;
        $_SESSION['institute3'] = $institute3;
        $_SESSION['score'] = $score;
        $_SESSION['year'] = $year;
    } else {
        $save_err = "Please fill out the required fields.";
    }

    // ---------------------Technical Skills variables -----------------------
    $hard_skills = $_POST['hard_skills'];
    $soft_skills = $_POST['soft_skills'];
    $projects = $_POST['projects'];
    $experience = $_POST['experience'];
    

    if ((!empty($hard_skills)) && (!empty($soft_skills)) && (!empty($projects))) {
        //store the data in session variables
        $_SESSION['hard_skills'] = $hard_skills;
        $_SESSION['soft_skills'] = $soft_skills;
        $_SESSION['projects'] = $projects;
        $_SESSION['experience'] = $experience;
        
       
    } else {
        $save_err = "Please fill out the required fields.";
    }

    header('location: home.php');
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
    <title>Dashboard</title>
</head>

<body>
    <?php include "navigation.php"; ?>
    <br>
    <br>
    <br>

    <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <p>
            <a href="logout.php" class="btn btn-danger ml-3">Log Out</a>
        </p>
-->
    </div>

    <h1 class="my-5">Hi, <b><?php echo ($_SESSION["username"]) . " " . $_SESSION["lastname"]; ?></b>. Welcome to the Dashboard.</h1>
    <!--<p>
        User details :-
        <ul>
            <li><?php echo "user_id: " . $_SESSION["id"] . "<br>"; ?></li>
            <li><?php echo "username: " . $_SESSION["username"] . "<br>"; ?></li>
            <li><?php echo "email: " . $_SESSION["email"] . "<br>"; ?></li>
            <li><?php echo "birthday: " . $_SESSION["birthday"] . "<br>"; ?></li>
            <li><?php echo "Registration_Time: " . $_SESSION["reg_time"] . "<br>"; ?></li>

        </ul>
    </p> -->

    <div class="form_wrapper form-control">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h2>Portfolio</h2>
            <br>
            <p class="alert"><?php echo $save_err; ?></p>
            <!-- ---------------------------------------------- Personal Information -------------------------------------------- -->
            <fieldset class="border p-4">
                <legend class="float-none w-auto p-2">Personal Information</legend>

                <div class="form-group row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="" class="col-form-label">Name*</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="col-auto">
                        <label for="" class="col-form-label">Email*</label>
                    </div>
                    <div class="col-auto">
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>

                </div>
                <br>
                <div class="form-group row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="" class="col-form-label">Mobile No.*</label>
                    </div>
                    <div class="col-auto">
                        <input type="phone" class="form-control" name="mobile" id="mobile" required>
                    </div>

                    <div class="col-auto">
                        <label for="" class="col-form-label">Linkedin</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="linkedin" id="linkedin">
                    </div>
                </div>
                <br>

                <div class="form-group row g-3">
                    <label for="" class="col-form-label">Gender : </label>
                    <div class="col-auto">
                        <div class="form-check form-check-inline">
                            <input type="radio" name="gender" id="male" value="option1">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="gender" id="female" value="option2">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="gender" id="other" value="option3">
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group row g-3">
                    <div class="col-auto">
                        <label for="hobby" class="form-label">Hobbies</label>
                        <input type="text" class="form-control" name="hobby" id="hobby">
                    </div>
                </div>
                <div class="form-group row g-3">
                    <div class="col-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St">
                    </div>
                    <div class="col-md-6">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" name="city" id="city">
                    </div>
                    <div class="col-md-4">
                        <label for="state" class="form-label">State</label>
                        <select id="state" name="state" class="form-select">
                            <option selected>Choose...</option>
                            <option>Andhra Pradesh</option>
                            <option>Arunachal Pradesh</option>
                            <option>Assam</option>
                            <option>Bihar</option>
                            <option>Chhattisgarh</option>
                            <option>Goa</option>
                            <option>Gujarat</option>
                            <option>Haryana</option>
                            <option>Himachal Pradesh</option>
                            <option>Jharkhand</option>
                            <option>Karnataka</option>
                            <option>Kerala</option>
                            <option>Madhya Pradesh</option>
                            <option>Maharashtra</option>
                            <option>Manipur</option>
                            <option>Meghalaya</option>
                            <option>Mizoram</option>
                            <option>Nagaland</option>
                            <option>Odisha</option>
                            <option>Punjab</option>
                            <option>Rajasthan</option>
                            <option>Sikkim</option>
                            <option>Tamil Nadu</option>
                            <option>Telangana</option>
                            <option>Tripura</option>
                            <option>Uttar Pradesh</option>
                            <option>Uttarakhand</option>
                            <option>West Bengal</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="zip" class="form-label">Zip</label>
                        <input type="text" class="form-control" name="zip" id="zip">
                    </div>
                </div>
            </fieldset>

            <!-- ---------------------------------------------- Academic Details -------------------------------------------- -->

            <br>
            <fieldset class="border p-4">
                <legend class="float-none w-auto p-2">Academic Details</legend>
                <div class="form-group row g-3 align-items-center">
                    <div class="col-sm">
                        <label for="" class="form-label">Course</label>
                        <select name="grad_course" id="grad_course" class="form-select">
                            <option selected>choose...</option>
                            <option>BE/BTech</option>
                            <option>BBA</option>
                            <option>BSC</option>
                            <option>BJMC</option>
                            <option>BA</option>
                        </select>

                    </div>
                    <div class="col-sm">
                        <label for="" class="form-label">Branch</label>
                        <select name="branch" id="branch" class="form-select">
                            <option selected>choose...</option>
                            <option>Computer Science and Engineering</option>
                            <option>Mechanical Engineering</option>
                            <option>Electrical and Electronics Engineering</option>
                            <option>Biotechnology</option>
                            <option>Aeronautical Engineering</option>
                            <option>Electronics & Communication</option>
                        </select>

                    </div>
                    <div class="col-sm">
                        <label for="" class="form-label">University/College</label>
                        <input type="text" class="form-control" name="institute" id="institute" placeholder="university name">
                    </div>
                    <div class="col-sm">
                        <label for="" class="form-label">Grade</label>
                        <input type="text" class="form-control" name="grade" id="grade" placeholder="8.7CGPA">
                    </div>
                    <div class="col-sm">
                        <label for="" class="form-label">Year</label>
                        <input type="text" class="form-control" name="grad_year" id="grad_year" placeholder="2019-2023">
                    </div>
                </div>
                <br>
                <div class="form-group row g-3 align-items-center">
                    <div class="col-sm">
                        <label for="" class="form-label">Course</label>
                        <select name="course2" id="" class="form-select">
                            <option selected>choose...</option>
                            <option name="class12">CLASS XII</option>
                            <option name="class10">CLASS X</option>
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="" class="form-label">Institute Name</label>
                        <input type="text" class="form-control" name="institute2" id="institute2">
                    </div>
                    <div class="col-sm">
                        <label for="board" class="form-label">Board</label>
                        <input type="text" class="form-control" name="board2" id="board2">
                    </div>
                    <div class="col-sm">
                        <label for="" class="form-label">Score</label>
                        <input type="text" class="form-control" name="score2" id="score2">
                    </div>
                    <div class="col-sm">
                        <label for="" class="form-label">Year</label>
                        <input type="text" class="form-control" name="year2" id="year2" placeholder="2021-2022">
                    </div>
                </div>
                <br>
                <div class="form-group row g-3 align-items-center">
                    <div class="col-sm">
                        <label for="" class="form-label">Course</label>
                        <select name="course" id="" class="form-select">
                            <option selected>choose...</option>
                            <option name="class12">CLASS XII</option>
                            <option name="class10">CLASS X</option>
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="" class="form-label">Institute Name</label>
                        <input type="text" class="form-control" name="institute3" id="institute3">
                    </div>
                    <div class="col-sm">
                        <label for="board" class="form-label">Board</label>
                        <input type="text" class="form-control" name="board" id="board">
                    </div>
                    <div class="col-sm">
                        <label for="" class="form-label">Score</label>
                        <input type="text" class="form-control" name="score" id="score">
                    </div>
                    <div class="col-sm">
                        <label for="" class="form-label">Year</label>
                        <input type="text" class="form-control" name="year" id="year" placeholder="2021-2022">
                    </div>
                </div>
            </fieldset>
            <br>

            <!-- ---------------------------------------------- Technical Skills -------------------------------------------- -->

            <fieldset class="border p-4">
                <legend class="float-none w-auto p-2">Technical Skills</legend>
                <div class="form-group row g-3 align-items-center">
                    <div class="col-sm">
                        <label for="" class="form-label">Hard Skills</label>
                        <input type="text" class="form-control" name="hard_skills" id="hard_skills" placeholder="Java, C++, Python, ...">
                    </div>
                    <div class="col-sm">
                        <label for="" class="form-label">Soft Skills</label>
                        <input type="text" class="form-control" name="soft_skills" id="soft_skills" placeholder="Communication Skills, Listening Skills, ...">
                    </div>
                </div>
                <br>
                <div class="col-12">
                    <label for="" class="form-label">Projects</label>
                    <input type="textarea" class="form-control" name="projects" id="projects" placeholder="mention your projects ...">
                </div>
                <br>
                <div class="col-12">
                    <label for="" class="form-label">Working Experience</label>
                    <input type="textarea" class="form-control" name="experience" id="experience" placeholder="mention your working experiences ...">
                </div>
            </fieldset>
            <br>
            <button type="submit" class="btn btn-primary btn-lg" name="save">Save</button>
        </form>
    </div>



</body>

</html>
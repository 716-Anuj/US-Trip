<?php
$insert = false;
if(isset($_POST['name'])){

$server = "localhost";
$username = "root";
$password = "kiit";
$con = mysqli_connect($server, $username, $password);

if(!$con)
{
    die("Connection to this database failed due to" . mysqli_connect_error());
}
// echo "Successfully connected to Database";
// $sno = $_POST['sno'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone']; 
$other = $_POST['other']; 

$sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
// echo $sql;

if($con->query($sql) == true)
{
    // echo "Successfully inserted";
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class = "bg" src="iit-kgp_ed.jpg" alt="iit kgp">
    <div class="container">
        <h1>Welcome to IIT Kharagpur US Trip form</h1>
        <p>Enter your details submit this form to confirm your participation in the trip</p>
        <?php
        if($insert == true)
        echo "<p class = 'submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>"
        ?>
        <form action="index.php" method="post">
            <input type="text" name = "name" id = "name" placeholder="Enter your name">
            <input type="number" name = "age" id = "age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class = "btn">Reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>
    <!-- INSERT INTO `trip` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'testname', '23', 'male', 'this@this.com', '9999999999', 'This is my first ever phpmyadmin message', current_timestamp()); -->
</body>
</html>
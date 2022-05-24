<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>
        <?php
        include "style.css";
        ?>
    </style>
    <div class="container">
        <h1>Welcome to Travel form</h1>
        <p>Enter your details and submit the form</p>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <button class="btn" name="submit">Submit</button>
            <?php
            if(isset($_POST['submit']))
                echo "<p class = 'submitMsg'>Thanks for submitting the form</p>";
            ?>
        </form>
    </div>
</body> 
</html>


<?php
$insert = false;
if(isset($_POST['submit'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con)
    {
        echo("Connection to this database is failer due to".mysqli_connect_error());
    }

  //  echo "Success connecting to this DB";

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $insert=false;
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', current_timestamp());";
    $s="select * from trip.trip";
//    echo $sql;
      //$result=mysqli_executequery
    if($con->query($sql) == true)
    {
    //  echo "Successfully inserted";
        $insert = true;
    }
    else    
    {
        echo "ERROR: $sql <br> $con->error";
    }
    
     $result=mysqli_query($con,$s);

     $row = mysqli_fetch_array($result, MYSQLI_NUM);
     printf ("%s (%s)\n", $row[0], $row[1]);

     
}
?>
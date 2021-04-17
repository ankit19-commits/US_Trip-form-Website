<?php
$insert = false;
if(isset($_POST['Name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database is failed due to" . mysqli_connect_error());
    }
    echo "Congrations😄";
    echo "<br>Success connecting to the database. ";
    //  collect post variables
    $Name = $_POST['Name']; 
    $Gender = $_POST['Gender'];
    $Age = $_POST['Age'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $Other = $_POST['desc'];
    $sql = "INSERT INTO 'us_trip' . 'trip' (`Name`, `Age` , `Gender`, `Email`, `Phone`, `Other`, `Date`) VALUE('$Name', '$Age', '$Gender', '$Email', '$Phone', '$desc', current_timestamp());"
    // Execute the query
    if ($con->query($sql) == true) {
         // echo $sql;
        //  Flag for successful insertion
        $insert = true;

    }
    else{
        echo "ERROR: $sql <br> $con->error";
        // $not_insert =true;
    }
    

    // Close the database connection
    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Karantina:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- <img class="college" src="college.jpg" alt="college" > -->
    <!-- <img class="masti" src="masti.jpg" alt="masti"> -->
    <img class="mycollege"  src="mycollege.jpg" alt="mycollege">
    <div class="container">
        <h1>Welcome to G.B. Pant Government Engineering College US Trip Form.</h1>
        <p>Enter your details and submit this form to confirm your participation in this Amazing Trip.</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for this Amazing US Trip</p>";
        }
        ?>
        <form action="index.php" method="post">
           <input type="text" name="name" id="name" placeholder="Enter your name">
           <input type="text" name= "age" id="age" placeholder="Enter your Age">
           <input type="text" name="gender" id="gender" placeholder="Enter your Gender" >
           <input type="email" name="email" id="email" placeholder="Enter your email">
           <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
           <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea> 
           <button class="btn">Submit<button>
               <!-- <button class="btn">Reset</button> -->
        </form>
   


    </div>
    <script src="index.js"></script>
    
    
</body>
</html>
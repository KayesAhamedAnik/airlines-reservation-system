<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>

    <div>

        <form method="post">
            <div style="font-size: 20px">Signup</div><br>

            <label for="uname"><b>Username :</b></label><input id="text" type="text" name="user_name"><br><br>

            <label for="pass"><b>Password :</b></label><input id="text" type="password" name="password"><br><br>

            <label for="cpass"><b>Confirm Password :</b></label><input id="text" type="password" name="confirmpassword"><br><br>

            <label for="email"><b>Email :</b></label><input id="text" type="email" name="email"><br><br>

            <label for="dob"><b>Date of birth :</b></label><input id="dob" type="date" name="date_of_birth"><br><br>

            <label for="phoneno"><b>Phone NO :</b></label><input id="text" type="number" name="phone_no"><br><br>

            <label for="passport"><b>Passport :</b></label><input id="text" type="text" name="passport"><br><br>

            <input id="button" type="submit" value="Signup"><br><br>

            <a href="../home.php">User Login</a><br><br>
        </form>
    </div>
</body>
</html>

<?php 
session_start();

    include "../repository/dbConnection.php";
    $conn=dbConnection();


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name = mysqli_real_escape_string($conn,$_POST['user_name']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $cpassword=mysqli_real_escape_string($conn,$_POST['confirmpassword']);
        $email= mysqli_real_escape_string($conn,$_POST['email']);
        $phoneno=mysqli_real_escape_string($conn,$_POST['phone_no']);
        $dob=mysqli_real_escape_string($conn,$_POST['date_of_birth']);
        $passport=mysqli_real_escape_string($conn,$_POST['passport']);

        //$sha1pass= sha1($password);

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)&& !empty($cpassword) && $password==$cpassword && !empty($email)&& !empty($phoneno)&& !empty($dob)&& !empty($passport))
        {

            //save to database

            $query = "INSERT INTO users (user_name,password,email,date_of_birth,phone_no,passport) VALUES ('$user_name','$password','$email','$dob','$phoneno','$passport');";

            if(mysqli_query(dbConnection(), $query)){

                echo "Sign up successfull";

            }
        }
        else
        {
            echo "Please Fill up the form correctly!";
        }
    }
?>

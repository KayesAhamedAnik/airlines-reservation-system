<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
</head>
<body>

    <div>

        <form method="post">
            <div style="font-size: 20px">User Login</div><br>

            <label for="uname"><b>Username :</b></label><input id="text" type="text" name="user_name"><br><br>

            <label for="pass"><b>Password :</b></label><input id="text" type="password" name="password"><br><br>



            <input id="button" type="submit" value="Login"><br><br>

            <a href="user/signup.php">Click to Signup</a><br><br>

            <a href="user/adminlogin.php">Login as Admin</a>
        </form>
    </div>
</body>
</html>

<?php 

session_start();

     include "repository/dbConnection.php";
    
    $conn=dbConnection();




        if(isset($_POST['user_name'])& isset($_POST['password'])){
        $user_name = mysqli_real_escape_string($conn,$_POST['user_name']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        //$sha1pass = sha1($password);

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {

            //read from database
            $query = "select * from users where user_name = '$user_name' limit 1";
            $result = mysqli_query(dbConnection(), $query);

            if($result)
            {
                if( mysqli_num_rows($result) > 0)
                {

                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] === $password )
                    {

                        $_SESSION['user_id'] = $user_data['user_id'];
                        echo "<script> alert('login Successfull'); </script>";
                        
                        
                        die;
                    }
                }
            }

            echo "wrong username or password!";
        }else
        {
            echo "wrong username or password!";
        }
    }

?>
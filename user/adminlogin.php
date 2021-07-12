<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>

    <div>

        <form method="post">
            <div style="font-size: 20px">Admin Login</div><br>

            <label for="uname"><b>Username :</b></label><input id="text" type="text" name="admin_name"><br><br>


            <label for="pass"><b>Password :</b></label><input id="text" type="password" name="admin_password"><br><br>

            <input id="button" type="submit" value="Login"><br><br>

            <a href="../home.php">User Login</a><br><br>

        </form>
    </div>
</body>
</html>

<?php 
session_start();
include("../repository/dbConnection.php");



//if($_SERVER['REQUEST_METHOD'] == "POST")

    if(isset($_POST['admin_name'])& isset($_POST['admin_password'])){
    $admin_name = $_POST['admin_name'];
    $admin_password = $_POST['admin_password'];
    //$sha1pass = sha1($password);

    if(!empty($admin_name) && !empty($admin_password) && !is_numeric($admin_name))
    
    {

        //read from database
        $query = "select * from admins where admin_name = '$admin_name' and admin_password='$admin_password';";
        $result = mysqli_query(dbConnection(), $query);
        if(mysqli_num_rows($result)==1)
        {
                    session_start();
                    $_SESSION['admin_id'] = $admin_name;

                    
                    header("Location: ../admin/homepage.php");
                    die;
                    
                }
                else{echo "wrong username or password!";}
            }
        else{echo "wrong username or password!";}
    }

        
    
    


?>

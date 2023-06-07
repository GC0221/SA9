<?php
session_start();
include("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // User login
    if(isset($_POST['userLogin'])) {
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        $sql_query = "SELECT * FROM users WHERE email='$email' AND password='".md5($password)."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1) {
            $_SESSION['login_user'] = $row['id'];
            header("location: user/dashboard.php");
        } else {
            $error = "Invalid email or password";
        }
    }

    // Restaurant owner login
    if(isset($_POST['restaurantOwnerLogin'])) {
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        $sql_query = "SELECT * FROM users u JOIN restaurants r ON u.id=r.owner_id WHERE u.email='$email' AND u.password='".md5($password)."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1) {
            $_SESSION['login_user'] = $row['id'];
            $_SESSION['login_owner'] = $row['restaurant_id'];
            header("location: owner/dashboard.php");
        } else {
            $error = "Invalid email or password";
        }
    }
}
?>

<?php
session_start();

define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','javalogin');

//try connecting to database
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

//check connection
if($conn == false){
    dir('Error : Connot Connect');
}

if (isset($_POST['login_btn'])) {
    login();
}

//function for lofin

function Login(){
    if(isset($_SESSION['email_id'])){
        header("location: Admin_pannel.php");
        exit;
    }
    require_once "login_page.php";

    $email_id = $password = "";
    $error = "";

    //if request method is post

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(empty(trim($_POST['email_id'])) || empty(trim($_POST['[password']))){
            $error = "Plaser enter name + password";
        }
        else{
            $email_id = trim($_POST['email_id']);
            $password = trim($_POST['password']);
        }

        if(empty($error)){
            $sql ="SELECT * from login where email_id = '$email_id'and password = '$password'";

            $row = mysql_fetch_array($sql);
            if($row['email_id'] == $email_id && $row['password'] ==$password){
                header("location: Admin_pannel.php");
            }
            else{
                echo "Login faild";
            }
            
        }
    }
}
?>
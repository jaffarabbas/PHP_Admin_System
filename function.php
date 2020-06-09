<?php
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
//calling login function
if(isset($_POST['login_btn'])) {
    login();
}



//function for login
function login(){
    
}
function Questtion_insertion(){

    
}
?>
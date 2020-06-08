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
// if(isset($_POST['exam_inset'])) {
    
//     Question_insertion();
// }
    


//function for login
function login(){
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
            $sql ="SELECT * from login where email_id = '$email_id' and password = '$password'";

            $row = mysql_fetch_array($sql);
            if($row['email_id'] == $email_id && $row['password'] ==$password){
                header("location: logout.php");
            }
            else{
                echo "Login faild";
            }          
        }
    }
}

    if($conn == false){
        dir('Error : Connot Connect');
    }
    else{
        echo "dsfs";
    }
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $Select_Cource = $_POST['Select_Cource'];
        $Question = $_POST['Question'];
        $Option1 = $_POST['option1'];
        $Option2 = $_POST['option2'];
        $Option3 = $_POST['option3'];
        $Option4 = $_POST['option4'];
        $Answer = $_POST['Answer'];

        $sql = "INSERT INTO `questioncrud` (`Select_Cource`,`Question`,`option1`,`option2`,`option3`,`option4`,`Answer`) VALUES ('$Select_Cource''$Question','$Option1','$Option2','$Option3','$Option4','$Answer')";
        $result = mysqli_query($conn,$sql);
        
        if($result){
             $insert  = true;
             echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data entered Successfully</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
        }
        else{
            echo "Error". mysqli_error($conn);
        }
    
}
?>
<?php
$insert  = false;
$servername = "localhost";
$username = "root";
$passsword = "";   
$database = "javalogin";
$conn = mysqli_connect($servername,$username,$passsword,$database);   
//check connection
if($conn == false){
    dir('Error : Connot Connect');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $Select_Cource = $_POST['Select_Cource'];
    $Question = $_POST['Question'];
    $Option1 = $_POST['option1'];
    $Option2 = $_POST['option2'];
    $Option3 = $_POST['option3'];
    $Option4 = $_POST['option4'];
    $Answer =  $_POST['Answer'];

    $sql = "INSERT INTO `questioncurd` (`Id`, `Select_Cource`, `Question`, `option1`, `option2`, `option3`, `option4`, `Answer`) VALUES (NULL, '$Select_Cource', '$Question', '$Option1', '$Option2', '$Option3', '$Option4', '$Answer');";
    $result = mysqli_query($conn,$sql);   

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="../cdn\animate.min.css">
    <link rel="stylesheet" href="../cdn\font-awesome.min.css">
    <link rel="stylesheet" href="../cdn\bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" > -->

     <!-- BOOTSTRAP STYLES-->
    
     <link href="assets2/css/css.css" rel="stylesheet" />
     <link href="assets2/css/bootstrap.css" rel="stylesheet" />
     <link href="assets2/css/custom.css" rel="stylesheet" />
     <link href="assets2/css/font-awesome.css" rel="stylesheet" />
 <style>

 </style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">ADMIN</a>
            </div>
            <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets2/img/find_user.png" class="user-image img-responsive" />
                    </li>
                    <li>
                        <a class="active-menu" onclick="mypop3()"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a  onclick="mypop()"><i class="fa fa-users fa-3x"></i>Exam Insertion<span class="fa arrow"></span></a>
                    </li>
                    <li>
                        <a  onclick="mypop2()"><i class="fa fa-user fa-3x"></i>Result<span class="fa arrow"></span></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Admin Dashboard</h2>
                        <h5>Welcome <?php$_SESSION['email_id']?> , Love to see you back. </h5>
                       
                        <section class="page_for_dashboared" id="dashboared">
                        <?php
                        if($result){
                            $insert  = true;
                            echo  '<div><h4 style="color : green">Question Inserted !!</h4></div>';
                        }
                        else{
                           echo "Error". mysqli_error($conn);
                        }
                        ?>
                        </section>
                        <div class="Insert_main" id="staff_inser" style="display=none">
                            <section class="sec_insert">
                                <form class="form_insert" action="Admin_pannel.php" method="POST" style="display=none">
                                      <label class="Ins_staff text-center">Exam Question</label><br><br>
                                      <label for="exampleFormControlSelect1">Example select</label>
                                      <select class="form-control" id="Seleter_for_Example" name="Select_Cource">
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                      </select>                     
                                      <label for="">Question</label>
                                      <textarea class="form-control" id="Question_insert" name="Question" rows="3"></textarea>
                                     
                                      
                                      <label for="">Option 1</label>
                                      <input class="form-control" id="option_1" name="option1" >
                                     
                                      
                                      <label for="">Option 2</label>
                                      <input class="form-control" id="option_2" name="option2" >
                                     
                                      
                                      <label for="">Option 3</label>
                                      <input class="form-control" id="option_3" name="option3" >
                                     
                                      
                                      <label for="">Option 4</label>
                                      <input class="form-control" id="option_4" name="option4" >
                                     
                                      <div class="form-group" onclick="gr()">
                                      <label for="">Answers</label>
                                      <select class="form-control" id="" name="Answer" >
                                      <option id="Selecter_1"></option>
                                      <option id="Selecter_2"></option>
                                      <option id="Selecter_3"></option>
                                      <option id="Selecter_4"></option>
                                      </select>
                                                                          
                                    <input type="submit" class="btn btn-warning form-control"  id="btn_reg"/>
                                 </form>
                            </section>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
                <!-- /. ROW  -->



</body>
<script>
    function mypop()
{
  var x = document.getElementById("staff_inser");
  var y = document.getElementById("Student_insert");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none"
  } else {
    x.style.display ="none";
  } 
}
function mypop2()
{
  var x = document.getElementById("Student_insert");
  var y = document.getElementById("staff_inser");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display ="none";
  } else {
    x.style.display ="none";
  } 
}

function mypop3(){
    var a = document.getElementById("dashboared");
    var x = document.getElementById("Student_insert");
    var y = document.getElementById("staff_inser");
  if (a.style.display === "none") {
    a.style.display = "block";
    x.style.display = "none";
    y.style.display ="none";
  } else {
    a.style.display ="none";
  } 
}

function gr()
{
    var var_for_selecter_1 =  document.getElementById('option_1').value; 
            
    document.getElementById('Selecter_1').innerHTML = var_for_selecter_1; 

    var var_for_selecter_1 =  document.getElementById('option_2').value; 
            
    document.getElementById('Selecter_2').innerHTML = var_for_selecter_1; 

    var var_for_selecter_1 =  document.getElementById('option_3').value; 
            
    document.getElementById('Selecter_3').innerHTML = var_for_selecter_1; 

    var var_for_selecter_1 =  document.getElementById('option_4').value; 
            
    document.getElementById('Selecter_4').innerHTML = var_for_selecter_1; 
}
</script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="..\assets\bootstrap\js\bootstrap.min.js"></script>
<script src="..\cdn\bootstrap.min.js"></script>
<script src="../js/js.js"></script> -->

<script src="assets2/js/bootstrap.min.js"></script>
<script src="assets2/js/custom.js"></script>
<script src="assets2/js/jquery-1.10.2.js"></script>
<script src="assets2/js/jquery.metisMenu.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
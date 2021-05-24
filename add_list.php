<?php
include('config/constant.php');

?>
<html>
<head>
<link rel="stylesheet" href = "css/style.css" />
<title> Task Manager</title>
</head>

<body>
<div class = "wrapper" >
<h1> Task Manager </h1>

<?php

if (isset($_SESSION['add_fail'])){
    echo $_SESSION['add_fail'];

    unset($_SESSION['add']);
}

?>

<a href = "index.php"> Home </a>
<a href="manage_lists.php"> Manage Lists </a>

<form method="POST" action ="" > 

<table class= 'tbl-half'>

<tr>

<td> Name: </td>
<td> <input type = "text" name ="list_name" required = "required" placeholder = "List Item Name"/> </tr>

</tr>

<tr>

<td> Description: </td>
<td> <input type = "text" name ="descp_name" placeholder = "Description of List"/> </td>
</tr>


<tr>
<td> <input type = "submit" name = "submit" value = "SAVE" /> </td>
</tr>

</table>

</form>
</div>
</body>

</html>

<?php

if(isset($_POST["submit"])){
   
    $list_name  = $_POST['list_name'];
    $list_description = $_POST['descp_name'];
    $conn = mysqli_connect("localhost","root","root") or die(mysqli_error());
    
    if($conn==true){
        echo "Database Connected";
    }

    $db_select = mysqli_select_db($conn,"task_manager");
    if($db_select==true){
        echo "connected baby";
    }
  // $sql = "INSERT INTO tbl_lists SET LIST_NAME = $list_name, LIST_DESC= $list_description";


  $sql = "INSERT INTO  tbl_lists (LIST_NAME, LIST_DESC)
VALUES ('$list_name', '
$list_description')";

  $res = mysqli_query($conn,$sql);
if($res==true){
      $_SESSION['add'] = "List added succesfully";
      header('Location: http://localhost:8888/task_website/manage_lists.php');
  }
  else{
      echo "DATA not inserted";
      $_SESSION['add_fail'] = "Failed to add list";

      header('Location:  http://localhost:8888/task_website/add_list.php');
  }
  

}

?>
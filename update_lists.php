
<?php
include('config/constant.php');
if(isset($_GET['list_id'])){
$list_id = $_GET['list_id'];
$conn = mysqli_connect("localhost","root","root") or die(mysqli_error());
$db_select = mysqli_select_db($conn,"task_manager");
$sql  =  "SELECT * FROM tbl_lists WHERE LIST_ID=$list_id" ;
$res = mysqli_query($conn,$sql);
if($res ==true){
    $row = mysqli_fetch_assoc($res);
    $list_name = $row['LIST_NAME'];
    $list_description = $row['LIST_DESC'];


}
}
?>

<html>
<head>
<title> Task Manager</title>
<link rel="stylesheet" href = "css/style.css" />
</head>

<body>
<div class = "wrapper" >
<h1> Task Manager </h1>


<a href = "index.php"> Home </a>
<a href="manage_lists.php"> Manage Lists </a>

<form method="POST" action ="" > 

<table class = 'tbl-half'>

<tr>

<td> Name: </td>
<td> <input type = "text" name ="list_name" required = "required" value=<?php echo $list_name; ?>/> </tr>

</tr>

<tr>

<td> Description: </td>
<td> <input type = "text" name ="descp_name" value = <?php echo $list_description;?> />  </td>
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

if (isset($_POST['submit'])){
   
    $list_name = $_POST['list_name'];
    $desciption_name = $_POST['descp_name'];

    $conn2 = mysqli_connect("localhost",'root','root');
    $db_select2 = mysqli_select_db($conn,'task_manager');
   

     echo $sql = "UPDATE tbl_lists SET
                  LIST_NAME='$list_name' WHERE LIST_ID='$list_id'";
    $res2 = mysqli_query($conn,$sql);
    


if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}


}



?>
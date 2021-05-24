<?php 

include('config/constant.php');
if (isset($_GET['task_id'])){
    $task_id = $_GET['task_id'];
    $conn = mysqli_connect('localhost','root','root');
    $db_select =mysqli_select_db($conn,"task_manager");
    $sql = "DELETE FROM tbl_tasks WHERE TASK_ID='$task_id'";
    $res  = mysqli_query($conn,$sql);
    if($res==true){
        header('location: index.php');
    }
}

?>

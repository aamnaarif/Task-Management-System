<?php
include('config/constant.php');
if(isset($_GET['list_id'])){
    
    $list_id = $_GET['list_id'];
    echo $list_id;
    $conn = mysqli_connect('localhost','root','root');
    $db_select = mysqli_select_db($conn,"task_manager");
    $sql = "DELETE FROM tbl_lists WHERE LIST_ID=$list_id";
    $res = mysqli_query($conn,$sql);

    if($res==true){
        header('location: manage_lists.php');
        


    }

}
else{
    echo "failed";
    
}
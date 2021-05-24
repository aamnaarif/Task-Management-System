<?php
include("config/constant.php");
$list_id_url = $_GET['list_id'];

?>

<html>
<head>
<link rel="stylesheet" href = "css/style.css" />
</head>
<body>
<div class = "wrapper" >
    <h1>
    Task Manager
    </h1>

    <div class = "menu">
    <a href = "index.php"> Home </a>

    <?php
    $conn = mysqli_connect('localhost','root','root');
    $db_select = mysqli_select_db($conn,'task_manager');
    $sql  = "SELECT * FROM tbl_lists";
    $res = mysqli_query($conn,$sql);
    if($res==true){
        $count_rows  = mysqli_num_rows($res);
        if($count_rows>0){
            while($row=mysqli_fetch_assoc($res)){
                $list_id = $row['LIST_ID'];
                $list_name = $row['LIST_NAME'];
                ?>
                <a href ="list_task.php?list_id=<?php echo $list_id ; ?>"> <?php echo $list_name;?> </a>
                <?php
            }
        }
    }
    ?>

    <a href = "manage_lists.php"> Manage Lists </a>
    

    </div>

    <div class = "all-tasks">
    <a href = "add_tasks.php" class= "btn-primary"  > Add Tasks <a>
    <table class = "tbl-full">
    <tr>
        <th>  S.N </th>
         <th>  Task Name </th>
          <th>  Priority </th>
           <th>  Deadline </th>
            <th>  Actions </th>
        </tr>

     <?php

    $conn = mysqli_connect('localhost','root','root');
    $db_select =mysqli_select_db($conn,"task_manager");
    $sql = "SELECT * FROM tbl_tasks WHERE LIST_ID='$list_id_url'";
    $res =mysqli_query($conn,$sql);
    
        if($res==true){
     $count_rows = mysqli_num_rows($res);
    $sn =1;
    if($count_rows>0){
            
            while($rows= mysqli_fetch_assoc($res)){
               
                 $task_id = $rows['TASK_ID'];
                 $task_name = $rows["TASK_NAME"];
                $priority = $rows['PRIORITY'];
                 $deadline = $rows['DEADLINE'];
                ?>

                <tr>
                <td>  <?php echo $sn++ ;?> </td>
                <td>  <?php echo $task_name;?> </td>
                <td>  <?php echo $priority; ?> </td>
                <td>  <?php echo $deadline ; ?>  </td>
                
                <td> 
                <a href = "update_task.php?task_id=<?php echo $task_id; ?>" > Update </a>
                <a href = "delete_task.php?task_id=<?php echo $task_id ;?>" > Delete </a>
                </td>
                </tr>
                <?php
            }}

        
    

    }
    ?>
</div>
</body>
</html>
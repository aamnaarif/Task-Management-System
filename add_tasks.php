<?php 
include('config/constant.php')
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href = "css/style.css" />
</head>
<body>
<div class = "wrapper" >

    <h1>
    Task Manager
    </h1>

    <a href="index.php"> Home </a>
    <h3> Add Task Page </h3>

    <form method= 'POST' action = ''>
    <table class = 'tbl-half'>
    <tr>
    <td> Task Name: </td>
    <td> <input type = "text" name ="task_name" placeholder = "Type Task Name" required = 'required'/> </td>

    </tr>
    <tr>
    <td> Task Description </td>
    <td> <textarea name = "task_desc" placeholder = "Type Task Description"> </textarea> </td> 

    </tr>

    <tr>
    <td> Select List: </td>
    <td> 
    <select name="list_id">

    <option value="1"> To Do </option>
    <option value="2"> Doing </option>
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
                <option value="<?php echo $list_id ?>"> <?php echo $list_name;?> </option>
                <?php
            }
        }
    }
    ?>

    ?>
    </select>
    </td>

    

    </tr>

    <tr>
    <td> Priority: </td>
    <td> <select name= "priority" >
    <option value = "High" > High </option>
    <option value = "Medium" > Medium </option>
    <option value = "Low" > Low </option>
    </select>
    </td>



    </tr>
    <tr>
    <td> Deadline: </td>
    <td> <input type='date' name = 'deadline'/> </td>
    </tr>

    <tr>
    <td> <input type = 'submit' name= 'submit' value = 'SAVE'/> </td>
    </tr>
    </table>

    </form>
</div>
</body>
</html>

<?php

if(isset($_POST['submit'])){
    echo "whatsUp?";
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_desc'];
    $task_id = $_POST['list_id'];
    $priority = $_POST['priority'];
    $deadline = $_POST['deadline'];

    $conn2 = mysqli_connect('localhost','root','root');
    $db_select2 =mysqli_select_db($conn,'"task_manager');
    $sql = "INSERT INTO  tbl_tasks (TASK_NAME, TASK_DESC,LIST_ID,PRIORITY,DEADLINE)
VALUES ('$task_name', '
$task_description','$task_id','$priority','$deadline')";




$res2 = mysqli_query($conn,$sql);
if($res2==true){
    header('location: index.php');
    
}

}



?>
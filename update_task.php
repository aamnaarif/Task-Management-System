<?php
include("config/constant.php");
if(isset($_GET['task_id'])){

$task_id = $_GET['task_id'];
$conn = mysqli_connect("localhost","root","root") or die(mysqli_error());
$db_select = mysqli_select_db($conn,"task_manager");
$sql  =  "SELECT * FROM tbl_tasks WHERE TASK_ID='$task_id'" ;
$res = mysqli_query($conn,$sql);
if($res ==true){
   
    $row = mysqli_fetch_assoc($res);
    
    $task_name = $row['TASK_NAME'];
    $task_description = $row['TASK_DESC'];
    $priority = $row['PRIORITY'];
    $deadline = $row['DEADLINE'];

}
}


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
    <td> <input type = "text" name ="task_name" placeholder = "Type Task Name" required = 'required' value = "<?php echo $task_name ;?>"/> </td>

    </tr>
    <tr>
    <td> Task Description </td>
    <td> <textarea name = "task_desc" placeholder = "Type Task Description" > <?php echo $task_description ;?> </textarea> </td> 

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
    <option <?php if($priority == 'High'){echo "selected='selected'";}?> value = "High" > High </option>
    <option <?php if($priority == 'Medium'){echo "selected='selected'";}?> value = "Medium" > Medium </option>
    <option <?php if($priority == 'Low'){echo "selected='selected'";}?>value = "Low" > Low </option>
    </select>
    </td>



    </tr>
    <tr>
    <td> Deadline: </td>
    <td> <input type='date' name = 'deadline' value = '<?php echo $deadline ; ?>'/> </td>
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

if (isset($_POST['submit'])){
   
     $task_name_2 = $_POST['task_name'];
     $desciption_name_2 = $_POST['task_desc'];
     $deadline = $_POST['deadline'];
    $list_id = $_POST['list_id'];
    $priority = $_POST['priority'];

    

    $conn2 = mysqli_connect("localhost",'root','root');
    $db_select2 = mysqli_select_db($conn,'task_manager');
   

      echo $sql = "UPDATE tbl_tasks SET
                  TASK_NAME='$task_name_2', TASK_DESC = '$desciption_name_2',
                  DEADLINE = '$deadline', PRIORITY = '$priority', LIST_ID = '$list_id'
                  WHERE TASK_ID='$task_id'";
    $res2 = mysqli_query($conn,$sql);
    


if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
  header('location: index.php');

} else {
  echo "Error updating record: " . mysqli_error($conn);
}


}



?>
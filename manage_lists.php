<?php
include('config/constant.php');

?>
<html>

<head>
<title> Task Manager </title>
<link rel="stylesheet" href = "css/style.css" />
</head> 

<body>
<div class = "wrapper" >


<h1> Task Mananger </h1>
<?php
echo $_SESSION;
if (isset($_SESSION['add'])){
    echo $_SESSION['add'];

    unset($_SESSION['add']);
}
echo "hello";

?>
<a href="index.php"> Home Page </a>
<div class = "all-lists"> 
<a href="add_list.php"> Add List </a>
<table class='tbl-half'>
<tr>
<th> S.N </th>
<th> List Name </th>
<th> Actions </th> 
</tr>
<?php

$conn = mysqli_connect("localhost","root","root") or die(mysqli_error());
    
   

    $db_select = mysqli_select_db($conn,"task_manager");
     
    $sql = "SELECT * FROM tbl_lists";
    $res = mysqli_query($conn, $sql);

    if(res == true){
        $count_rows  = mysqli_num_rows($res);

        $sn = 1;
        if($count_rows >0){
            while($row = mysqli_fetch_assoc($res)){
                $list_id = $row['LIST_ID'];
                $list_name = $row["LIST_NAME"];

                ?>
                <tr>
<td> <?php echo $sn++; ?> </td>
<td> <?php echo  $list_name; ?> </td>
<td> 
<a href = "update_lists.php?list_id=<?php echo $list_id;?>"> Update </a>
<a href ="delete_lists.php?list_id=<?php echo $list_id;?>"> Delete </a>

</td> 
</tr>
<?php

            }
        }
    }
    

?>







</table>
</div>
</div>
</body>
</html>
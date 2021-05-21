<?php
include('config/constant.php');

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
</head>
<body>
    <h1>
    Task Manager
    </h1>

    <div class = "menu">
    <a href = "index.php"> Home </a>

    <a href = "#"> To Do </a>
    <a href = "#"> Doing </a>
    <a href = "#"> Done </a>

    <a href = "manage_lists.php"> Manage Lists </a>
    

    </div>


    <div class = "all-tasks">
    <a href = "#" > Add Tasks <a>
    <table>
    <tr>
        <th>  S.N </th>
         <th>  Task Name </th>
          <th>  Priority </th>
           <th>  Deadline </th>
            <th>  Actions </th>
        </tr>

     <tr>
        <td>  1. </td>
         <td>  Design a Website</td>
          <td>  Medium </td>
           <td>  23/05/2021 </td>
            <td>  Actions </td>
            <td> 
            <a href = "#" > Update </a>
            <a href = "#" > Delete </a>
            </td>

        </tr>


    </table>
    </div>
</body>
</html>
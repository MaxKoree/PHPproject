<?php
include 'database.php';

//initialize session
session_start();
?>

<html>
    <head>
        <title>Personal data</title>
         <!-- include css file -->
         <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="topnav">
            <a class="active" href="welcome_user.php">Home</a>
            <a href="user.php">User</a>
            <a href="logout.php">Logout</a>
        </div>
        <?php
        
        echo "<table>";

        $db = new database('localhost', 'root', '', 'project1', 'utf8');
        $result_set = $db->get_user_info($_SESSION['username']);

        $columns = array_keys($result_set);
        $row_data = array_values($result_set);

        echo "<table>";
        echo "<tr>";
            foreach($columns as $column){
                echo "<th> $column </th>";
            }
        echo "</tr>";

        echo "<tr>";
            foreach($row_data as $value){
                echo "<td> $value </td>";
            }
        echo "</tr>";

        echo "</table>"

        

        //echo "<table>";
        ?>
    
    </body>
</html>
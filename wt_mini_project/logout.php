<?php
    if(isset($_GET["data"])){
        include 'include/db_connect.php';
        $data=$_GET["data"];
        $sql = "SELECT * FROM user where username='$data';";
        $result = mysqli_query($conn, $sql);
        if (isset($result->num_rows) && $result->num_rows ==1) {
            while ($row = mysqli_fetch_row($result)) {
                $email=$row[1];
            }
        session_start();
        $_SESSION[$email]="-1";
        
        }
    }
    header("Location: http://localhost/wt_mini_project/");
    exit();
    $conn->close();
?>
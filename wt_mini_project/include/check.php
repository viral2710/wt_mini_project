<?php

    function usercheck($data,$r) {
        include 'db_connect.php';
        $sql = "SELECT * FROM user where username='$data';";
        $result = mysqli_query($conn, $sql);
        if (isset($result->num_rows) && $result->num_rows ==1) {
            while ($row = mysqli_fetch_row($result)) {
                $email=$row[1];
                $password=$row[3];
                $role=$row[5];
            }
            session_start();
            if(isset($_SESSION[$email])&& $_SESSION[$email] == $password && $role==$r){
                return true;
            }else{
                return false;
            }
        }
        return false;
    }
?>
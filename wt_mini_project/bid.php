<?php
include ('include/check.php');
  if(!isset($_GET["data"])){
    $error="Need to Login ";
    header("Location: http://localhost/wt_mini_project/login.php?error=$error");
    exit();
    
  }else{
    $name=$_GET["data"];
    $r="buyer";
    if(!usercheck($name,$r)){
      $error="Need to Login ";
      header("Location: http://localhost/wt_mini_project/login.php?error=$error");
      exit();
    }
  }
?>
<?php
    include ('include/db_connect.php');
    $pid=$_GET["pid"];
    if(isset($_POST["bid"])){
        $bid=$_POST["bid"];
        $sql = "SELECT * FROM product where pid='$pid'";
        $result = mysqli_query($conn, $sql);
        if (isset($result->num_rows) && $result->num_rows ==1) {
            while ($row = mysqli_fetch_row($result)) {
                $sname=$row[8];
            }
        }
        $sql="INSERT INTO `bid` (`Bname`, `Sname`, `Pid`, `Bid`, `id`) VALUES ('$name', '$sname', '$pid', '$bid', NULL);";
        if ($conn->query($sql) == TRUE){
            $sql = "SELECT max(Bid) FROM bid where pid='$pid'";
            $result = mysqli_query($conn, $sql);
            if (isset($result->num_rows) && $result->num_rows ==1) {
                while ($row = mysqli_fetch_row($result)) {
                    $bid=$row[0];
                }
            }
            $sql="UPDATE `product` SET `sold_status` = 'Sold' WHERE `product`.`pid` = $pid;";
            if ($conn->query($sql) == TRUE){
                $sql = "SELECT * FROM result where pid='$pid'";
                $result = mysqli_query($conn, $sql);
                if (isset($result->num_rows) && $result->num_rows ==1) {
                    while ($row = mysqli_fetch_row($result)) {
                        $rid=$row[0];
                    }
                    $sql="UPDATE `result` SET `Amount` = '$bid',`bname` = '$name' WHERE `result`.`id` = $rid;";
                    if ($conn->query($sql) == TRUE){
                        header("Location: http://localhost/wt_mini_project/buyerppage.php?data=$name&pid=$pid");
                        exit();
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                        exit();
                    }
                }else{
                    $sql="INSERT INTO `result` (`id`, `bname`, `Pid`, `Amount`) VALUES (NULL,'$name', '$pid', '$bid') ;";
                    if ($conn->query($sql) == TRUE){
                        header("Location: http://localhost/wt_mini_project/buyerppage.php?data=$name&pid=$pid");
                        exit();
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                        exit();
                    }
                }
               
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                exit();
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            exit();
        }
        
    }
?>
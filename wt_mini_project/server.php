<?php
include ('include/db_connect.php');
$name="";
if(isset($_POST["login_email"])){
  $email=mysqli_real_escape_string($conn,$_POST["login_email"]);
  $password=mysqli_real_escape_string($conn,$_POST["login_password"]);
  $password=md5($password);
  $sql = "SELECT * FROM user where email='$email' and password='$password'";
  $result = mysqli_query($conn, $sql);
  
  if (isset($result->num_rows) && $result->num_rows ==1) {
    session_start();
    $_SESSION[$email]=$password;
     
   
    while ($row = mysqli_fetch_row($result)) {
     $name=$row[2];
      if($row[5]=='admin'){
        
        header("Location: http://localhost/wt_mini_project/index.php?data=$name");
        exit();
      }
      elseif($row[5]=='buyer'){
        
        header("Location: http://localhost/wt_mini_project/indexbuyer.php?data=$name");
        exit();
      }else{
        header("Location: http://localhost/wt_mini_project/indexseller.php?data=$name");
        exit();
      } 
     
    }

  }else{
    $error="Invalid email or password ";
    header("Location: http://localhost/wt_mini_project/login.php?error=$error");
        exit();
  }
}
if(isset($_POST["email_signup"])){
    $email=mysqli_real_escape_string($conn,$_POST["email_signup"]);
    $uname=mysqli_real_escape_string($conn,$_POST["username_signup"]);
    $password=mysqli_real_escape_string($conn,$_POST["password_signup"]);
    $gender = mysqli_real_escape_string($conn,$_POST["gender_signup"]);
    $role= mysqli_real_escape_string($conn,$_POST["role_signup"]);
    $phno=mysqli_real_escape_string($conn,$_POST["phno_signup"]);
    $address=mysqli_real_escape_string($conn,$_POST["address_signup"]);
    $password=md5($password);
    $sql = "INSERT INTO `user` (`id`, `email`, `username`, `password`, `gender`, `role`, `phone`, `address`) VALUES (current_timestamp(), '$email', '$uname', '$password', '$gender', '$role', '$phno', '$address');";
    if ($conn->query($sql) == TRUE){
        session_start();
        $_SESSION[$email]=$password;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }
    $name=$uname;
    if($role=='admin'){
      
      header("Location: http://localhost/wt_mini_project/index.php?data=$name");
      exit();
    }
    elseif($row[5]=='buyer'){
     
      header("Location: http://localhost/wt_mini_project/indexbuyer.php?data=$name");
      exit();
    }else{
      
      header("Location: http://localhost/wt_mini_project/indexseller.php?data=$name");
      exit();
    }
    
}

$conn->close();
?>


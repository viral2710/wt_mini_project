<?php
include ('include/check.php');
  if(isset($_GET["data"])){
    $uname=$_GET["data"];
    $r="seller";
    if(!usercheck($uname,$r)){
      $error="Need to Login ";
      header("Location: http://localhost/wt_mini_project/login.php?error=$error");
      exit();
    }
  }
?>
<?php 

if (isset($_POST['name']) && isset($_FILES['filename'])) {
	include "include/db_connect.php";
	$img_name = $_FILES['filename']['name'];
	$img_size = $_FILES['filename']['size'];
	$tmp_name = $_FILES['filename']['tmp_name'];
	$error = $_FILES['filename']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'upload /'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
                $name=mysqli_real_escape_string($conn,$_POST["name"]);
                $price=mysqli_real_escape_string($conn,$_POST["price"]);
				$description=mysqli_real_escape_string($conn,$_POST["description"]);
				$time=mysqli_real_escape_string($conn,$_POST["time"]);
                $sql="INSERT INTO `product` (`id`,`time`, `name`, `amount`, `description`, `file`, `sold_status`, `pid`,`sname`) VALUES (current_timestamp(),'$time', '$name', '$price', '$description', '$new_img_name', 'Not Sold', NULL,'$uname');";
				if ($conn->query($sql) == TRUE){
					header("Location: http://localhost/wt_mini_project/productpage.php?data=$uname");
                	exit();
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
					exit();
				}
				
			}else {
				$em = "You can't upload files of this type";
		        echo $em;
			}
		}
	}else {
		$em = "unknown error occurred!";
		echo $em;
	}

}else {
	echo "hi";
}
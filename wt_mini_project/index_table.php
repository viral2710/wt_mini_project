<?php
include ('include/check.php');
  if(!isset($_GET["data"])){
    $error="Need to Login ";
    header("Location: http://localhost/wt_mini_project/login.php?error=$error");
    exit();
    
  }else{
    $name=$_GET["data"];
    $r="admin";
    if(!usercheck($name,$r)){
      $error="Need to Login ";
      header("Location: http://localhost/wt_mini_project/login.php?error=$error");
      exit();
    }
  }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/font/material-design-icons/Material-Design-Icons.woff'><link rel="stylesheet" href="./css/index.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link href="css/datatables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>


a,a:visited,a:hover, a:active, a:focus {
  color:white;
  text-decoration: none;
}
</style>

</head>

  
</head>

<body>

<ul id="slide-out" class="side-nav fixed z-depth-2">
    <li class="center no-padding">
      <div class="indigo darken-2 white-text" style="height: 50px;">
        <div class="row">
          
           hi,<?php echo $name;
           ?>
        </div>
      </div>
    </li>

    
    <ul class="collapsible" data-collapsible="accordion">
      <li id="dash_users">
        <div id="dash_users_header" class="collapsible-header waves-effect"><b>Users</b></div>
        <div id="dash_users_body" class="collapsible-body">
          <ul>
            <li id="users_seller">
              <a class="waves-effect" style="text-decoration: none;" href="http://localhost/wt_mini_project/index_table.php?data=admin&role=Seller">Seller</a>
            </li>

            <li id="users_Buyer">
              <a class="waves-effect" style="text-decoration: none;" href="http://localhost/wt_mini_project/index_table.php?data=admin&role=Buyer">Buyer</a>
            </li>
          </ul>
        </div>
      </li>

      <li id="dash_products">
        <div id="dash_products_header" class="collapsible-header waves-effect"><b>Products</b></div>
        <div id="dash_products_body" class="collapsible-body">
          <ul>
            <li id="products_product">
              <a class="waves-effect" style="text-decoration: none;" href="http://localhost/wt_mini_project/appage.php?data=admin">Products</a>
              <a class="waves-effect" style="text-decoration: none;" href="http://localhost/wt_mini_project/aresult.php?data=admin">Orders</a>
            </li>
          </ul>
        </div>
      </li>
      <li id="dash_products">
        <div id="dash_products_header" class="collapsible-header waves-effect"><b>Feedback</b></div>
        <div id="dash_products_body" class="collapsible-body">
          <ul>
            <li id="products_product">
              <a class="waves-effect" style="text-decoration: none;" href="#!">Feedback</a>
              <a class="waves-effect" style="text-decoration: none;" href="#!">FAQ</a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </ul>

  <header>
    <ul class="dropdown-content" id="user_dropdown">
      <li><a class="indigo-text" href="http://localhost/wt_mini_project/logout.php?data=<?php echo $name;?>">Logout</a></li>
    </ul>

    <nav class="indigo" role="navigation">
      <div class="nav-wrapper">
        <a data-activates="slide-out" class="button-collapse show-on-" href="#!"><img style="margin-top: 17px; margin-left: 5px;" src="https://res.cloudinary.com/dacg0wegv/image/upload/t_media_lib_thumb/v1463989873/smaller-main-logo_3_bm40iv.gif" /></a>

        <ul class="right hide-on-med-and-down">
          <li>
            <a class='right dropdown-button' href='' data-activates='user_dropdown'><i class=' material-icons'>account_circle</i></a>
          </li>
        </ul>

        <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      </div>
    </nav>

    <nav>
      <div class="nav-wrapper indigo darken-2">
        <a style="margin-left: 20px;"  href="http://localhost/wt_mini_project/index.php?data=<?php echo $name;?>">Admin</a> >
        <a  href="#!"><?php
  if(isset($_GET["role"])){
      echo $_GET["role"];
  }
  ?></a>

        <div style="margin-right: 20px;" id="timestamp" class="right"></div>
      </div>
    </nav>
  </header>

  <main>
  <?php
  ?>
   <div class="row">
      <div class="col s6">
      <div class="container">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>id</th>
                    <th>E-mail</th>
                    <th>Username</th>
                    <th>password</th>
                    <th>Role</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                include ('include/db_connect.php');
                if(isset($_GET["role"])){
                    $role=$_GET["role"];
                    $sql = "SELECT * FROM user where role='$role';";
                    $result = mysqli_query($conn, $sql);
                    if (isset($result->num_rows) && $result->num_rows >=1) {
                    // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            echo  "<tr>
                            <td>".$row['id']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['username']."</td>
                            <td>".$row['password']."</td>
                            <td>".$row['gender']."</td>
                            <td>".$row['role']."</td>
                            <td>".$row['phone']."</td>
                            <td>".$row['address']."</td>
                        </tr>";
                        }
                    }
                }
                
                ?>
                
            </tbody>
        </table>
    </div>
    

    <!-- Bootstrap core JavaScript-->
    
          
</div>
</div>

    


<!-- partial -->
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js'></script><script  src="./js/script.js"></script>
<script src="js/jquery.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="js/jquery.datatables.min.js"></script>

    <script src="js/datatables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
</body>
</html>

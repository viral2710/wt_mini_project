<?php
include ('include/check.php');
  if(!isset($_GET["data"])){
    $error="Need to Login ";
    header("Location: http://localhost/wt_mini_project/login.php?error=$error");
    exit();
    
  }else{
    $name=$_GET["data"];
    $r="seller";
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
  <title>Seller Dashboard </title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/font/material-design-icons/Material-Design-Icons.woff'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/TimeCircles.css">
    <link rel="stylesheet" href="./css/list.css">
    
    <style>

a,a:visited,a:hover, a:active, a:focus {
  color:white;
  text-decoration: none;
}
</style>  
</head>
<body>
<!-- partial:index.partial.html -->
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

  <ul id="slide-out" class="side-nav fixed z-depth-2">
    <li class="center no-padding">
      <div class="indigo darken-2 white-text" style="height: 50px;">
        <div class="row">
          
           hi,<?php echo $name?>
        </div>
      </div>
    </li>


    <ul class="collapsible" data-collapsible="accordion">
      <li id="dash_users">
        <div id="dash_users_header" class="collapsible-header waves-effect"><b>Product</b></div>
        <div id="dash_users_body" class="collapsible-body">
          <ul>
            <li id="add product">
              <a class="waves-effect" style="text-decoration: none;" href="http://localhost/wt_mini_project/addproduct.php?data=<?php echo $name;?>">Register Products</a>
            </li>
            <li id="productpage">
              <a class="waves-effect" style="text-decoration: none;" href="http://localhost/wt_mini_project/productpage.php?data=<?php echo $name;?>">Product list</a>
            </li>
            <li id="productpage">
              <a class="waves-effect" style="text-decoration: none;" href="http://localhost/wt_mini_project/sresult.php?data=<?php echo $name;?>">Result</a>
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
              <a class="waves-effect" style="text-decoration: none;" href="#!">FQA</a>
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
        <a style="margin-left: 20px;"  href="http://localhost/wt_mini_project/indexseller.php?data=<?php echo $name;?>">Seller</a>>
        <a  href="#!">Product Page</a>

        <div style="margin-right: 20px;" id="timestamp" class="right"></div>
      </div>
    </nav>
  </header>

    <main>    
        <?php
              date_default_timezone_set('Asia/Kolkata');
              $today = date("Y-m-d H:i:s");  
              include ('include/db_connect.php');
                $pid=$_GET["pid"];
                $sql = "SELECT max(Bid) FROM bid where pid='$pid'";
                $result = mysqli_query($conn, $sql);
                if (isset($result->num_rows) && $result->num_rows ==1) {
                    while ($row = mysqli_fetch_row($result)) {
                        $hbid=$row[0];
                    }
                }
                $sql = "SELECT * FROM product where sname='$name' and pid='$pid'";
                $result = mysqli_query($conn, $sql);
                
                if (isset($result->num_rows) && $result->num_rows ==1) {
                    while ($row = mysqli_fetch_row($result)) { 
                      $time=str_replace("t"," ",$row[1]);
                      $sbid=$row[3]; 
                        echo "
                        <div class='row'>
                          <div data-date=".$row[1]." id='count-down'></div>
                        </div>
                        <div class='row'>
                          <div class='col-md-5'>
                          <img class='img-responsive' src='./upload/".$row[5]."' alt=".$row[2].">
                          </div>
                              <div>
                                  <h3>".$row[2]."</h3>
                                  <h6 class='sale_price'>Strating Bid :- Rs.".$row[3]."</h6>
                                  <h6>".$row[4]."</h6>
                                  <h6 id=".$row[6]."></h6>
                                  <h6>Highest Bid:-".$hbid."</h6>"; 
                                  if($today<$time){
                                    echo "<div id='tb'>
                                    <label>Your Bid:</label>
                                    <form>
                                    <div class='col-xs-3'>
                                    <input type='Number' class='form-control' id='bid' name='bid' disabled>
                                    </div>
                                    <button id='bid' disabled>Place Bid</button>
                                    </form>
                                  </div>
                                </div>
                              </div>";
                                  }else{
                                    echo"<h2>Time's Up!</h2></div>
                                    </div>";
                                  }
                                  
                    }
                    echo" </div>
                    </div>";
                    $sql = "SELECT b.`Bname`, b.`Sname`, b.`Pid`, b.`Bid`, b.`id`,p.`name` FROM `bid` as b,`product` as p WHERE b.Pid=p.pid and b.Pid='$pid'";
                    $result = mysqli_query($conn, $sql);
                    echo"<div class='row'><h3>Bidder List</h3></div><div class='row'>
                    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                <thead>
                    <tr>
                        <th>Buyer Name</th>
                        <th>Bid</th>
                    </tr>
                </thead><tbody>";
                    if (isset($result->num_rows) && $result->num_rows >=1) {
                        while ($row = mysqli_fetch_row($result)) {
                          echo "<tr>
                        <th>".$row[0]."</th>
                        <th>".$row[3]."</th>
                        </tr>";
                        }
                      }
                      echo "</tbody>
                      </table></div>";
                } else {
                    echo"No Item
                    </div>
        </div>";
                }
                $conn->close();
                ?>
          </div>
        </div>
      </main>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js'></script><script  src="./js/script.js"></script>
<script src="jquery-3.3.1.min.js"></script>
<script src="js/TimeCircles.js"></script>
<script type="text/javascript">
    $(function () {
       
		$("#count-down").TimeCircles({count_past_zero: false}).addListener(countdownComplete);
        //$("#count-down").TimeCircles().destroy();
	function countdownComplete(unit, value, total){
		if(total<=0){
      $("#tb").fadeIn('slow').replaceWith("<h2>Time's Up!</h2>");
      $("#Sold").fadeIn('slow').replaceWith("<h6 id='Sold'><b>Sold</b></h6>");
      $("#Not Sold").fadeIn(100).replaceWith("<h6 id='Not Sold'><b>Not sold</b></h6>");
		}else{
      $("#Sold").fadeIn(100).replaceWith("<h6 id='Sold'><b>Bidding Live</b></h6>");
      $("#Not Sold").fadeIn(100).replaceWith("<h6 id='Not Sold'><b>Not Sold</b></h6>");
    }
	}

        
    });
</script>

</body>
</html>

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

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Buyer Dashboard </title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/font/material-design-icons/Material-Design-Icons.woff'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/list.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/TimeCircles.css">
    
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
            <li id="Product List">
              <a class="waves-effect" style="text-decoration: none;" href="http://localhost/wt_mini_project/bproductlist.php?data=<?php echo $name;?>">Product List</a>
            </li>

            <li id="My Auction">
              <a class="waves-effect" style="text-decoration: none;" href="http://localhost/wt_mini_project/MyAuction.php?data=<?php echo $name;?>">My Auction</a>
            </li>
            <li id="Order">
              <a class="waves-effect" style="text-decoration: none;" href="http://localhost/wt_mini_project/Order.php?data=<?php echo $name;?>">Order</a>
            </li>
          </ul>
        </div>
      </li>

      <li id="Feedback">
        <div id="feedback_header" class="collapsible-header waves-effect"><b>Feedback</b></div>
        <div id="feedback_body" class="collapsible-body">
          <ul>
            <li id="feeback">
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
        <a style="margin-left: 20px;"  href="http://localhost/wt_mini_project/indexbuyer.php?data=<?php echo $name;?>">Buyer</a>>
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
                $sql = "SELECT max(Bid) FROM bid where pid='$pid' and bname='$name'";
                $result = mysqli_query($conn, $sql);
                if (isset($result->num_rows) && $result->num_rows ==1) {
                    while ($row = mysqli_fetch_row($result)) {
                        $yhbid=$row[0];
                    }
                }
                $sql = "SELECT * FROM product where pid='$pid'";
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
                                  <h4>".$row[2]."</h4>
                                  <h6 class='sale_price'>Strating Bid :- Rs.".$sbid."</h6>
                                  <h6>".$row[4]."</h6>
                                  <h6 id=".$row[6]."></h6>
                                  <h6>Current Bid:- <b>".$hbid."</b></h6>
                                  <h6>Your Highest Bid:- <b>".$yhbid."</b> </h6>";
                                  if($today<$time){
                                    echo "<div id='tb'>
                                    <label>Your Bid:</label>
                                    <form action='product.php' method='post'>
                                    <div class='col-xs-3'>
                                    <input type='Number' class='form-control' id='bid' name='bid' oninput='myFunctionv()' >
                                    </div>
                                    <button id='bid_button' formaction='bid.php?data=".$name."&pid=".$row[7]."' type='submit' disabled >Place Bid</button>
                                    </form>
                                  </div>
                                </div>
                              </div>";
                                  }else{
                                    echo"<h2>Time's Up!</h2></div>
                                    </div>";
                                  }
                                  
                    }
                } else {
                    echo"No Item";
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
<script src="js/jquery.datatables.min.js"></script>

<script src="js/datatables.bootstrap4.min.js"></script>
<script>
    function myFunctionv() {
        var x = document.getElementById("bid").value;
        var y=<?php
        if(isset($hbid)){
            echo $hbid;
        }else{
            echo $sbid;
        }
        ?>;
        if((y+1000)<=x){
            document.getElementById("bid_button").disabled = false; 
        }else{
            document.getElementById("bid_button").disabled = true;
        }
    }
</script>

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

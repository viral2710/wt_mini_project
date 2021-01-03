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
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css'>
<link rel="stylesheet" href="./css/list.css"><link rel="stylesheet" href="./css/index.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
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
        <a style="margin-left: 20px;"  href="http://localhost/wt_mini_project/indexseller.php?data=<?php echo $name;?>">Seller</a> >
        <a  href="#!">Register Products</a>

        <div style="margin-right: 20px;" id="timestamp" class="right"></div>
      </div>
    </nav>
  </header>

  <main>
  <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Add new Product</h2>
                <form action="product.php"method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <h6>Product title</h6>
                        <input type="pTitle" class="form-control" id="pTitle" name="name" required>
                    </div>
                    <div class="row">
                        <div class="col-xs-2">
                            <div class="form-group">
                            <h6>Bidding Price</h6>
                                <div class="input-group">
                                    <div class="input-group-addon">Rs</div>
                                    <input type="number" class="form-control" id="price" name="price" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                    <div class="form-group">
                        <h6>Product Description</h6>
                        <textarea type="pDesc" class="form-control" id="pDesc" name="description" required></textarea>
                    </div>

                    <div class="form-group">
                        <h6>Add Image</h6>
                        <label><input type="file" name="filename"> </label>
                    </div>
                    <div class="form-group">
                        <h6>Time limit</h6>
                        <label><input type="datetime-local" id="time" name="time"> </label>
                    </div>
                    
                    <button id="addToCart" class="btn btn-success" formaction="product.php?data=<?php echo $name;?>" type="submit">Add Product</button>
                </form>
            </div>
        </div>
    </div>
    

</html>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js'></script><script  src="./js/script.js"></script>

</body>
</html>

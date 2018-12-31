<?php
session_start();
require_once('sessionAdmin1.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome &mdash; Admin</title>


<!--######################################################### -->
  
  <link rel="stylesheet" href="css/themes/redmond/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/demo1.css">
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/modalform.css">
  
  
  <!-- FOR IE9 below -->
  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->

  </head>
  <body>

  <div id="fh5co-page">
    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
    <aside id="fh5co-aside" role="complementary" class="border js-fullheight">

      <h1 id="fh5co-logo"><a href="adminlevel1.php"><img src="images/logo.png"></a></h1>
      <h5 style="text-align: center;"><i><a>Welcome: ADMIN <?php echo $login_session;?></a></i></h5>
      <nav id="fh5co-main-menu" role="navigation">
        <ul>  
          <li><a href="adminlevel1.php">Home</a></li>
          <li><a href="authorize-alu.php">Alumni</a></li>
          <li><a href="authorize-mo.php">Moderator</a></li>
          <!--<li><a href="#">Setting</a></li>-->
          <li><a href="adminlogout.php">Logout</a></li>
        </ul>
      </nav>

      <div class="fh5co-footer">
        <p>
          <small>&copy; 2012 Information Technology Office.All Rights Reserved
          <span>INFOTECH UNIVERSITI TEKNOLOGI MARA KELANTAN,BUKIT ILMU,18500 MACHANG,KELANTAN.
          </span>
          </small>
        </p>
      </div>

    </aside>

    <div id="fh5co-main"> 

      <div class="fh5co-narrow-content">
        <div class="row">
          <div class="animate-box" data-animate-effect="fadeInLeft">
            <h1 class="fh5co-heading-colored">AUTHORIZE &amp; MODERATOR</h1>
          </div>
        </div>
        <div class="row">
            <div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
              <?php
                require 'connection.php';
                $result = mysql_query("SELECT * FROM moderator ") or die(mysql_error());
               ?>
              
              <div id="users-contain" class="ui-widget" style="text-align: center;overflow-x:auto;margin:auto;width: 100%;padding: 10px;margin-top: 30px;">
                <h1 style="color:#36FE00;">Moderator Online:</h1>
                <table id="users" class="ui-widget ui-widget-content" style="width:100%;overflow-x:auto;margin:auto;padding: 10px;margin-top: 10px;">
                  <thead>
                    <tr class="ui-widget-header" style="height: 50px;">
                      <th>Id</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Last Login</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    while($row = mysql_fetch_array($result)){
                  ?>  
                    <tr class="record">
                      <td><?php echo $row['Id']?></td>
                      <td><?php echo $row['Name']?></td>
                      <td><?php echo $row['Email']?></td>
                      <td><?php echo $row['Last_Login']?></td>      
                      <td><?php echo $row['status'];?></td>>
                    </tr>
                  <?php
                    }
                    mysql_close($connection);
                      
                  ?>
                  </tbody>
                </table>
               </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Javascript -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/styling.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.countTo.js"></script>
  <script src="js/main.js"></script>
  <script src="js/modernizr-2.6.2.min.js"></script>

  </body>
</html>


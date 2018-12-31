<?php
session_start();
require_once('sessionModerator.php');
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
  <title>Welcome &mdash; Moderator</title>


<!--######################################################### -->

  <link rel="stylesheet" href="css/themes/redmond/jquery-ui.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/demo1.css">
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
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

      <h1 id="fh5co-logo"><a href="moderator.php"><img src="images/logo.png"></a></h1>
      <h5 style="text-align: center;"><i><a><?php echo $login_session;?></a></i></h5>
      <nav id="fh5co-main-menu" role="navigation">
        <ul>  
          <li><a href="moderator.php">Home</a></li>
          <li><a href="jobVacancies.php">Job Available</a></li>
          <li><a href="Event.php">Event</a></li>
          <li><a href="message.php">Message</a></li>
          <li><a href="moderatorlogout.php">Log Out</a></li>
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
            <h1 class="fh5co-heading-colored">Message</h1>
          </div>
        </div>
        <div class="row">
          <div class="animate-box" data-animate-effect="fadeInLeft">
            
             <?php
              require 'connection.php';
              $checkid = $_SESSION['login_id'];
              $result = mysql_query("SELECT * FROM `mail`") or die(mysql_error());
             ?>
            
            <div id="users-contain" class="ui-widget" style="text-align: center;overflow-x:auto;margin:auto;width: 100%;padding: 10px;margin-top: 10px;">
              <table id="users" class="ui-widget ui-widget-content" style="width:100%;overflow-x:auto;margin:auto;padding: 10px;margin-top: 10px;">
                <thead>
                  <tr class="ui-widget-header" style="height: 50px;">
                    <th>From Name</th>
                    <th>To Name</th>
                    <th>Subject</th>
                    <th>Content</th>
                    <th>Send Date</th>
                    <th>Sender Status</th>
                    <th>Received Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  while($row = mysql_fetch_array($result)){
                ?>  
                  <tr class="record-mail">
                    <td style="display: none;"><span class="mail-id"><?php echo $row['Id']?></span></td>
                    <td><span class="mail-fname"><?php echo $row['FromName']?></span></td>
                    <td><span class="mail-tname"><?php echo $row['ToName']?></span></td>
                    <td><span class="mail-subject"><?php echo $row['Subject']?></span></td>
                    <td><span class="mail-content"><?php echo $row['Content']?></span></td>
                    <td><span class="mail-senddate"><?php echo $row['SendDate']?></span></td>
                    <td><span class="mail-senderstatus"><?php echo $row['SenderStatus']?></span></td>
                    <td><span class="mail-receivedstatus"><?php echo $row['ReceivedStatus']?></span></td>
                    <td>
                      <button class="read-mail"></button>
                      <!--<button class="delete-mail"></button>-->
                    </td>
                  </tr>
                <?php
                  }
                  mysql_close($connection);
                    
                ?>
                </tbody>
              </table>
            </div>

            <div id="deletemail-dialog-confirm" title="Delete Mail">
              <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?
              </p>
              <input type="hidden" name="deletemailid" id="deletemailid" value="">
                  
              <!-- Allow form submission with keyboard without duplicating the dialog button -->
              <input name="submit" type="submit" tabindex="-1" style="position:absolute; top:-1000px">
            </div>

             <div id="readmail-dialog-confirm" title="Read Mail">
              <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Read this Content?
              </p>
              <input type="hidden" name="readmailid" id="readmailid" value="">
                  
              <!-- Allow form submission with keyboard without duplicating the dialog button -->
              <input name="submit" type="submit" tabindex="-1" style="position:absolute; top:-1000px">
            </div>  
  

          </div>
        </div>
      </div>


    </div>
  </div>
  

  <!--################# Javascript ###################-->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/jquery.timepicker.js"></script>
  <script src="js/styling.js"></script>
  <script src="js/modalLogin.js"></script>
  <script src="js/modalmessage.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.countTo.js"></script>
  <script src="js/main.js"></script>
  <script src="js/modernizr-2.6.2.min.js"></script>
  <!--###############################################-->

  </body>
</html>


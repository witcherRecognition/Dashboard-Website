<?php
session_start();
require_once('session.php');
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
  <title>Welcome &mdash; Alumni</title>


<!--######################################################### -->

  <link rel="stylesheet" href="css/themes/redmond/jquery-ui.css">
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

      <h1 id="fh5co-logo"><a href="alumniPage.php"><img src="images/logo.png"></a></h1>
      <h5 style="text-align: center;"><i><a><?php echo $login_session;?></a></i></h5>
      <nav id="fh5co-main-menu" role="navigation">
        <ul>  
          <li><a href="alumniPage.php">Home</a></li>
          <li><a href="userProfile.php">Profiles</a></li>
          <li><a href="news.php">News</a></li>
          <li><a href="#"><span id="button-mail">Contact Us</span></a></li>
          <li><a href="logout.php">Log Out</a></li>
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
            <h1 class="fh5co-heading-colored">Event Info</h1>
          </div>
        </div>
        <div class="row">
          <div class="animate-box" data-animate-effect="fadeInLeft"> 
            
              <?php
              require 'connection.php';
              $checkid = $_SESSION['login_id'];
              $result = mysql_query("SELECT * FROM `event` ") or die(mysql_error());
             ?>
            
            <div id="users-contain" class="ui-widget" style="text-align: center;overflow-x:auto;margin:auto;width: 100%;padding: 10px;margin-top: 10px;">
              <table id="users" class="ui-widget ui-widget-content" style="width:100%;overflow-x:auto;margin:auto;padding: 10px;margin-top: 10px;">
                <thead>
                  <tr class="ui-widget-header" style="height: 50px;">
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Over</th>
                    <th>Event Time</th>
                    <th>Event Description</th>
                    <th>Venue</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  while($row = mysql_fetch_array($result)){
                ?>  
                  <tr class="record-event">
                    <td style="display: none;"><span class="event-id"><?php echo $row['Id']?></span></td>
                    <td><span class="event-name"><?php echo $row['EvName']?></span></td>
                    <td><span class="event-date"><?php echo $row['EvDate']?></span></td>
                    <td><span class="event-over"><?php echo $row['Over']?></span></td>
                    <td><span class="event-time"><?php echo $row['EvTime']?></span></td>
                    <td><span class="event-desc"><?php echo $row['EvDesc']?></span></td>
                    <td><span class="event-venue"><?php echo $row['Venue']?></span></td>
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

      <div class="fh5co-narrow-content">
        <div class="row">
          <div class="animate-box" data-animate-effect="fadeInLeft">
            <h1 class="fh5co-heading-colored">Job Available Info</h1>
          </div>
        </div>
        <div class="row">
          <div class="animate-box" data-animate-effect="fadeInLeft">

            <?php
              require 'connection.php';
              $checkid = $_SESSION['login_id'];
              $result = mysql_query("SELECT * FROM `aluvacancies` ") or die(mysql_error());
             ?>
            
            <div id="users-contain" class="ui-widget" style="text-align: center;overflow-x:auto;margin:auto;width: 100%;padding: 10px;margin-top: 10px;">
              <table id="users" class="ui-widget ui-widget-content" style="width:100%;overflow-x:auto;margin:auto;padding: 10px;margin-top: 10px;">
                <thead>
                  <tr class="ui-widget-header" style="height: 50px;">
                    <th>Company Name</th>
                    <th>Company Profile</th>
                    <th>Position</th>
                    <th>Job Description</th>
                    <th>Desired Profile</th>
                    <th>Desired Expertise</th>
                    <th>Created Date</th>
                    <th>Expire Date</th>
                    <th>Contact Person</th>                    
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  while($row = mysql_fetch_array($result)){
                ?>  
                  <tr class="record-job">
                    <td style="display: none;"><span class="job-id"><?php echo $row['Id']?></span></td>
                    <td><span class="job-name"><?php echo $row['CompanyName']?></span></td>
                    <td><span class="job-profile"><?php echo $row['CompanyProfile']?></span></td>
                    <td><span class="job-position"><?php echo $row['Position']?></span></td>
                    <td><span class="job-des"><?php echo $row['JobDescription']?></span></td>
                    <td style="display: none;"><span class="job-categ"><?php echo $row['Category']?></span></td>
                    <td style="display: none;"><span class="job-locat"><?php echo $row['Location']?></span></td>
                    <td><span class="job-desprof"><?php echo $row['DesiredProfile']?></span></td>
                    <td><span class="job-desexp"><?php echo $row['DesiredExp']?></span></td>
                    <td><span class="job-create"><?php echo $row['CreatedDate']?></span></td>
                    <td><span class="job-expire"><?php echo $row['ExpiryDate']?></span></td>
                    <td><span class="job-contact"><?php echo $row['ContactPerson']?></span></td>
                    <td style="display: none;"><span class="job-design"><?php echo $row['Designation']?></span></td>
                    <td style="display: none;"><span class="job-office"><?php echo $row['OfficeNo']?></span></td>
                    <td><span class="job-email"><?php echo $row['Email']?></span></td>
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
      
      <div id="contact-dialog-form" title="Email">
        <p class="validateTips">
        Contact us at chick@gmail.com
        <br>All form fields are required.
        </p>
        <form>
          <fieldset>
            <input type="hidden" name="contactid" id="contactid" value="<?php echo $_SESSION['login_id']?>">
            <input type="hidden" name="contactname" id="contactname" value="<?php echo $_SESSION['login_alumni']?>">
            <label for="contactemail">Email</label>
            <input type="text" name="contactemail" id="contactemail" value="" class="text ui-widget-content ui-corner-all">
            <label for="contactsubject">Subject</label>
            <input type="text" name="contactsubject" id="contactsubject" value="" class="text ui-widget-content ui-corner-all">
            <label for="contactmsg">Message</label>
            <textarea class="text ui-widget-content ui-corner-all" id="contactmsg" name="contactmsg" placeholder="Enter your massage for us here. We will get back to you as soon as possible." rows="10" cols="50" required></textarea>
       
            <!-- Allow form submission with keyboard without duplicating the dialog button -->
            <input name="submit" type="submit" tabindex="-1" style="position:absolute; top:-1000px">
          </fieldset>
        </form>
      </div>

    </div>
  </div>
  

  <!--################# Javascript ###################-->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/styling.js"></script>
  <script src="js/modalcontact.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.countTo.js"></script>
  <script src="js/main.js"></script>
  <script src="js/modernizr-2.6.2.min.js"></script>
  <!--###############################################-->
  
  <?php
    require 'updateSession.php'
  ?>
  </body>
</html>


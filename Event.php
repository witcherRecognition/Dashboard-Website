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
          <li><a href="#">Message</a></li>
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
            <h1 class="fh5co-heading-colored">Event Info</h1>
          </div>
        </div>
        <div class="row">
          <div class="animate-box" data-animate-effect="fadeInLeft">

            <div id="createevent-dialog-form" title="Create new Event">
              <p class="validateTips">All form fields are required.</p>
              <form>
                <fieldset>
                  <label for="eventname">Event Name</label>
                  <input type="text" name="eventname" id="eventname" value="" class="text ui-widget-content ui-corner-all">
                  <label for="eventdate">Event Date</label>
                  <input type="text" name="eventdate" id="eventdate" value="" class="text ui-widget-content ui-corner-all">
                  <label for="eventover">Over</label>
                  <input type="text" name="eventover" id="eventover" value="" class="text ui-widget-content ui-corner-all">
                  <label for="eventtime">Event Time</label>
                  <input type="text" name="eventtime" id="eventtime" value="">
                  <label for="venue">Venue</label>
                  <input type="text" name="venue" id="venue" value="" class="text ui-widget-content ui-corner-all">
                  <label for="eventdes">Event Description</label>
                  <input type="text" name="eventdes" id="eventdes" value="" class="text ui-widget-content ui-corner-all">
             
                  <!-- Allow form submission with keyboard without duplicating the dialog button -->
                  <input name="submit" type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                </fieldset>
              </form>
            </div>  
            
             <?php
              require 'connection.php';
              $checkid = $_SESSION['login_id'];
              $result = mysql_query("SELECT * FROM `event` WHERE `LookId`='".$checkid."' ") or die(mysql_error());
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
                    <th>Action</th>
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
                    <td>
                      <button class="edit-event"></button>
                      <button class="delete-event"></button>
                    </td>
                  </tr>
                <?php
                  }
                  mysql_close($connection);
                    
                ?>
                </tbody>
              </table>
              <div style="margin-top: 10px;text-align: left;">
                <button id="create-event">Create new Event</button>
              </div>
            </div>

            <div id="editevent-dialog-form" title="Edit Event">
              <p class="validateTips">All form fields are required.</p>
              <form>
                <fieldset>
                  <input type="text" name="editeventid" id="editeventid">
                  <label for="editeventname">Event Name</label>
                  <input type="text" name="editeventname" id="editeventname" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editeventdate">Event Date</label>
                  <input type="text" name="editeventdate" id="editeventdate" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editeventover">Over</label>
                  <input type="text" name="editeventover" id="editeventover" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editeventtime">Event Start</label>
                  <input type="text" name="editeventtime" id="editeventtime" value="">
                  <label for="editvenue">Venue</label>
                  <input type="text" name="editvenue" id="editvenue" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editeventdes">Event Description</label>
                  <input type="text" name="editeventdes" id="editeventdes" value="" class="text ui-widget-content ui-corner-all">
             
                  <!-- Allow form submission with keyboard without duplicating the dialog button -->
                  <input name="submit" type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                </fieldset>
              </form>
            </div> 
            
            <div id="deleteevent-dialog-confirm" title="Delete Event">
              <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?
              </p>
              <input type="hidden" name="deleteeventid" id="deleteeventid" value="">
                  
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
  <script src="js/modalevent.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.countTo.js"></script>
  <script src="js/main.js"></script>
  <script src="js/modernizr-2.6.2.min.js"></script>
  <!--###############################################-->

  </body>
</html>


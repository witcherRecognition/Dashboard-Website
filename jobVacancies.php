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
            <h1 class="fh5co-heading-colored">Job Vacancies Info</h1>
          </div>
        </div>
        <div class="row">
          <div class="animate-box" data-animate-effect="fadeInLeft">

            <div id="createjob-dialog-form" title="Create new Job Vacancies">
              <p class="validateTips">All form fields are required.</p>
              <form>
                <fieldset>
                  <label for="compname">Company Name</label>
                  <input type="text" name="compname" id="compname" value="" class="text ui-widget-content ui-corner-all">
                  <label for="compprof">Company Profile</label>
                  <textarea type="text" name="compprof" id="compprof" value="" class="text ui-widget-content ui-corner-all"></textarea>
                  <label for="position">Position</label>
                  <input type="text" name="position" id="position" value="" class="text ui-widget-content ui-corner-all">
                  <label for="jobdes">Job Description</label>
                  <input type="text" name="jobdes" id="jobdes" value="" class="text ui-widget-content ui-corner-all">
                  <label for="categ">Category</label>
                  <input type="text" name="categ" id="categ" value="" class="text ui-widget-content ui-corner-all">
                  <label for="locat">Location</label>
                  <input type="text" name="locat" id="locat" value="" class="text ui-widget-content ui-corner-all">
                  <label for="desprof">Desired Profile</label>
                  <textarea type="text" name="desprof" id="desprof" value="" class="text ui-widget-content ui-corner-all"></textarea>
                  <label for="desexp">Desired Expertise</label>
                  <textarea type="text" name="desexp" id="desexp" value="" class="text ui-widget-content ui-corner-all"></textarea>
                  <label for="creatdate">Created Date</label>
                  <input type="text" name="creatdate" id="creatdate" value="" class="text ui-widget-content ui-corner-all">
                  <label for="expdate">Expiry Date</label>
                  <input type="text" name="expdate" id="expdate" value="" class="text ui-widget-content ui-corner-all">
                  <label for="contper">Contact Person</label>
                  <input type="text" name="contper" id="contper" value="" class="text ui-widget-content ui-corner-all">
                  <label for="design">Designation</label>
                  <input type="text" name="design" id="design" value="" class="text ui-widget-content ui-corner-all">
                  <label for="offno">Office No</label>
                  <input type="text" name="offno" id="offno" value="" class="text ui-widget-content ui-corner-all">
                  <label for="email">Email</label>
                  <input type="text" name="email" id="email" value="" class="text ui-widget-content ui-corner-all">
             
                  <!-- Allow form submission with keyboard without duplicating the dialog button -->
                  <input name="submit" type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                </fieldset>
              </form>
            </div>  
            
             <?php
              require 'connection.php';
              $checkid = $_SESSION['login_id'];
              $result = mysql_query("SELECT * FROM `aluvacancies` WHERE `LookId`='".$checkid."' ") or die(mysql_error());
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
                    <th>Action</th>
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
                    <td>
                      <button class="edit-job"></button>
                      <button class="delete-job"></button>
                    </td>
                  </tr>
                <?php
                  }
                  mysql_close($connection);
                    
                ?>
                </tbody>
              </table>
              <div style="margin-top: 10px;text-align: left;">
                <button id="create-job">Create new Job Available</button>
              </div>
            </div>
    
            <div id="editjob-dialog-form" title="Update Job Vacancies">
              <p class="validateTips">All form fields are required.</p>
              <form>
                <fieldset>
                  <input type="hidden" name="editid" id="editid" value="">
                  <label for="editcompname">Company Name</label>
                  <input type="text" name="editcompname" id="editcompname" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editcompprof">Company Profile</label>
                  <textarea type="text" name="editcompprof" id="editcompprof" value="" class="text ui-widget-content ui-corner-all"></textarea>
                  <label for="editposition">Position</label>
                  <input type="text" name="editposition" id="editposition" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editjobdes">Job Description</label>
                  <input type="text" name="editjobdes" id="editjobdes" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editcateg">Category</label>
                  <input type="text" name="editcateg" id="editcateg" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editlocat">Location</label>
                  <input type="text" name="editlocat" id="editlocat" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editdesprof">Desired Profile</label>
                  <textarea type="text" name="editdesprof" id="editdesprof" value="" class="text ui-widget-content ui-corner-all"></textarea>
                  <label for="editdesexp">Desired Expertise</label>
                  <textarea type="text" name="editdesexp" id="editdesexp" value="" class="text ui-widget-content ui-corner-all"></textarea>
                  <label for="editcreatdate">Created Date</label>
                  <input type="text" name="editcreatdate" id="editcreatdate" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editexpdate">Expiry Date</label>
                  <input type="text" name="editexpdate" id="editexpdate" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editcontper">Contact Person</label>
                  <input type="text" name="editcontper" id="editcontper" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editdesign">Designation</label>
                  <input type="text" name="editdesign" id="editdesign" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editoffno">Office No</label>
                  <input type="text" name="editoffno" id="editoffno" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editemail">Email</label>
                  <input type="text" name="editemail" id="editemail" value="" class="text ui-widget-content ui-corner-all">
             
                  <!-- Allow form submission with keyboard without duplicating the dialog button -->
                  <input name="submit" type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                </fieldset>
              </form>
            </div>

            <div id="deletejob-dialog-confirm" title="Delete Job Vacancies">
              <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?
              </p>
              <input type="hidden" name="deleteid" id="deleteid" value="">
                  
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
  <script src="js/styling.js"></script>
  <script src="js/modalLogin.js"></script>
  <script src="js/modaljob.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.countTo.js"></script>
  <script src="js/main.js"></script>
  <script src="js/modernizr-2.6.2.min.js"></script>
  <!--###############################################-->

  </body>
</html>


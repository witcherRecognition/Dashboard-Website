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
            <h1 class="fh5co-heading-colored">Educational Info</h1>
          </div>
        </div>
        <div class="row">
          <div class="animate-box" data-animate-effect="fadeInLeft">

            <div id="dialog-form" title="Create new Education">
              <p class="validateTips">All form fields are required.</p>
              <form>
                <fieldset>
                  <label for="name">Education Name</label>
                  <input type="text" name="name" id="name" value="" class="text ui-widget-content ui-corner-all">
                  <label for="faculty">Faculty</label>
                  <input type="text" name="faculty" id="faculty" value="" class="text ui-widget-content ui-corner-all">
                  <label for="program">Program Name</label>
                  <input type="text" name="program" id="program" value="" class="text ui-widget-content ui-corner-all">
                  <label for="yop">Year of Passing</label>
                  <input type="text" name="yop" id="yop" value="" class="text ui-widget-content ui-corner-all">
             
                  <!-- Allow form submission with keyboard without duplicating the dialog button -->
                  <input name="submit" type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                </fieldset>
              </form>
            </div>  
            
             <?php
              require 'connection.php';
              $checkid = $_SESSION['login_id'];
              $result = mysql_query("SELECT * FROM educational WHERE RegNo='".$checkid."' ") or die(mysql_error());
             ?>
            
            <div id="users-contain" class="ui-widget" style="text-align: center;overflow-x:auto;margin:auto;width: 100%;padding: 10px;margin-top: 10px;">
              <table id="users" class="ui-widget ui-widget-content" style="width:100%;overflow-x:auto;margin:auto;padding: 10px;margin-top: 10px;">
                <thead>
                  <tr class="ui-widget-header" style="height: 50px;">
                    <th>Education Name</th>
                    <th>Faculty</th>
                    <th>Program</th>
                    <th>Year of Passing</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  while($row = mysql_fetch_array($result)){
                ?>  
                  <tr class="record">
                    <td><span class="ins-name"><?php echo $row['InsName']?></span></td>
                    <td><span class="fac-name"><?php echo $row['Faculty']?></span></td>
                    <td><span class="prog-name"><?php echo $row['ProgName']?></span></td>
                    <td><span class="yearpass"><?php echo $row['YOP']?></span></td>
                    <td style="display: none;"><span class="ins-id" style="display: none;"><?php echo $row['Id']?></span></>
                    </td>
                    <td>
                      <button class="edit-edu"></button>
                  <button class="delete-edu"></button>
                    </td>
                  </tr>
                <?php
                  }
                  mysql_close($connection);
                    
                ?>
                </tbody>
              </table>
              <div style="margin-top: 10px;text-align: left;">
                <button id="create-edu" style="margin-top: 10px;">Create new Education</button>
              </div> 
            </div>

            <div id="editedu-dialog-form" title="Update Education">
              <p class="validateTips">All form fields are required.</p>
              <form>
                <fieldset>
                  <input type="hidden" id="editid" value="">
                  <label for="editname">Education Name</label>
                  <input type="text" name="editname" id="editname" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editfaculty">Faculty</label>
                  <input type="text" name="editfaculty" id="editfaculty" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editprogram">Program Name</label>
                  <input type="text" name="editprogram" id="editprogram" value="" class="text ui-widget-content ui-corner-all">
                  <label for="edityop">Year of Passing</label>
                  <input type="text" name="edityop" id="edityop" value="" class="text ui-widget-content ui-corner-all">
             
                  <!-- Allow form submission with keyboard without duplicating the dialog button -->
                  <input name="submit" type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                </fieldset>
              </form>
            </div>

            <div id="deleteedu-dialog-confirm" title="Delete Education">
              <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?
              </p>
              <input type="hidden" name="deleteid" id="deleteid" value="">
                  
              <!-- Allow form submission with keyboard without duplicating the dialog button -->
              <input name="submit" type="submit" tabindex="-1" style="position:absolute; top:-1000px">
            </div>

          </div>
        </div>
      </div>

      <div class="fh5co-narrow-content">
        <div class="row">
          <div class="animate-box" data-animate-effect="fadeInLeft">
            <h1 class="fh5co-heading-colored">Expertise Info</h1>
          </div>
        </div>
        <div class="row">
          <div class="animate-box" data-animate-effect="fadeInLeft">
            <div id="exp-dialog-form" title="Create new Expertise">
              <p class="validateTips">All form fields are required.</p>
              <form>
                <fieldset>
                  <label for="expertisename">Expertise Name</label>
                  <input type="text" name="expertisename" id="expertisename" value="" class="text ui-widget-content ui-corner-all">
                  <label for="expertisedes">Description</label>
                  <input type="text" name="expertisedes" id="expertisedes" value="" class="text ui-widget-content ui-corner-all">
             
                  <!-- Allow form submission with keyboard without duplicating the dialog button -->
                  <input name="submit" type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                </fieldset>
              </form>
            </div>

            <?php
              require 'connection.php';
              $checkid = $_SESSION['login_id'];
              $result = mysql_query("SELECT * FROM expertise WHERE RegNo='".$checkid."' ") or die(mysql_error());
            ?>
            
            <div id="users-contain" class="ui-widget" style="text-align: center;overflow-x:auto;margin:auto;width: 100%;padding: 10px;margin-top: 10px;">
              <table id="users" class="ui-widget ui-widget-content" style="width:100%;overflow-x:auto;margin:auto;padding: 10px;margin-top: 10px;">
                <thead>
                  <tr class="ui-widget-header" style="height: 50px;">
                    <th>Expertise Name</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php       
                  while($row = mysql_fetch_array($result)){
                ?>
                  <tr class="records">
                    <td class="exp-name"><?php echo $row['Name']?></td>
                    <td class="exp-descript"><?php echo $row['Descript']?></td>
                    <td class="exp-id" style="display: none;"><?php echo $row['Id']?></td>
                    <td>
                      <button class="edit-exp"></button><br>
                      <button class="delete-exp"></button>
                    </td>
                  </tr>
                <?php
                  }
                  mysql_close($connection);
                ?>
                </tbody>
              </table>
              <div style="margin-top: 10px;text-align: left;">
                <button id="create-exp" style="margin-top: 10px;">Create new Expertise</button>
              </div>
            </div>

            <div id="editexp-dialog-form" title="Update Expertise">
              <p class="validateTips">All form fields are required.</p>
              <form>
                <fieldset>
                  <input type="hidden" name="editexpid" id="editexpid">
                  <label for="editexpname">Expertise Name</label>
                  <input type="text" name="editexpname" id="editexpname" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editexpdes">Description</label>
                  <input type="text" name="editexpdes" id="editexpdes" value="" class="text ui-widget-content ui-corner-all">
             
                  <!-- Allow form submission with keyboard without duplicating the dialog button -->
                  <input name="submit" type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                </fieldset>
              </form>
            </div>

            <div id="deleteexp-dialog-confirm" title="Delete Expertise">
              <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?
              </p>
              <input type="hidden" name="deleteexpid" id="deleteexpid" value="">
                  
              <!-- Allow form submission with keyboard without duplicating the dialog button -->
              <input name="submit" type="submit" tabindex="-1" style="position:absolute; top:-1000px">
            </div>

          </div>
        </div>
      </div>
      
      <div class="fh5co-narrow-content">
        <div class="row">
          <div class="animate-box" data-animate-effect="fadeInLeft">
            <h1 class="fh5co-heading-colored">Working Info</h1>
          </div>
        </div>
        <div class="row">
          <div class="animate-box" data-animate-effect="fadeInLeft">
          
          <div id="work-dialog-form" title="Create new Working">
            <p class="validateTips">All form fields are required.</p>
            <form>
              <fieldset>
                <label for="workname">Company Name</label>
                <input type="text" name="workname" id="workname" value="" class="text ui-widget-content ui-corner-all">
                <label for="workdesign">Designation</label>
                <input type="text" name="workdesign" id="workdesign" value="" class="text ui-widget-content ui-corner-all">
                <label for="workstart">Start</label>
                <input type="text" name="workstart" id="workstart" value="" class="text ui-widget-content ui-corner-all">
                <label for="workend">End</label>
                <input type="text" name="workend" id="workend" value="" class="text ui-widget-content ui-corner-all">
                <label for="workemail">Email</label>
                <input type="text" name="workemail" id="workemail" value="" class="text ui-widget-content ui-corner-all">
                <label for="workcontact">Contact No</label>
                <input type="text" name="workcontact" id="workcontact" value="" class="text ui-widget-content ui-corner-all">

                <!-- Allow form submission with keyboard without duplicating the dialog button -->
                <input name="submit" type="submit" tabindex="-1" style="position:absolute; top:-1000px">
              </fieldset>
            </form>
          </div>

          <?php
            require 'connection.php';
            $checkid = $_SESSION['login_id'];
            $result = mysql_query("SELECT * FROM workinginfo WHERE RegNo='".$checkid."'") or die(mysql_error());
          ?>

          <div id="users-contain" class="ui-widget" style="text-align: center;overflow-x:auto;margin:auto;width: 100%;padding: 10px;margin-top: 10px;">
            <table id="users" class="ui-widget ui-widget-content" style="width:100%;overflow-x:auto;margin:auto;padding: 10px;margin-top: 10px;">
              <thead>
                <tr class="ui-widget-header" style="height: 50px;">
                  <th>Company Name</th>
                  <th>Designation</th>
                  <th>Start</th>
                  <th>End</th>
                  <th>Email</th>
                  <th>Contact No</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php       
                while($row = mysql_fetch_array($result)){
              ?>
                <tr class="record-work">
                  <td class="work-name"><?php echo $row['Name']?></td>
                  <td class="work-design"><?php echo $row['Designation']?></td>
                  <td class="work-start"><?php echo $row['Start']?></td>
                  <td class="work-end"><?php echo $row['End']?></td>
                  <td class="work-email"><?php echo $row['Email']?></td>
                  <td class="work-contact"><?php echo $row['ContactNo']?></td>
                  <td class="work-id" style="display: none;"><?php echo $row['Id']?></td>
                  <td>
                    <button class="edit-work"></button>
                <button class="delete-work"></button>
                  </td>
                </tr>
              <?php
                }
                mysql_close($connection);   
              ?>
              </tbody>
            </table>
            <div style="margin-top: 10px;text-align: left;">
              <button id="create-work">Create new Work</button>
            </div>
          </div>

          <div id="editwork-dialog-form" title="Create new Working">
            <p class="validateTips">All form fields are required.</p>
            <form>
              <fieldset>
                <input type="hidden" name="editworkid" id="editworkid">
                <label for="editworkname">Company Name</label>
                <input type="text" name="editworkname" id="editworkname" value="" class="text ui-widget-content ui-corner-all">
                <label for="editworkdesign">Designation</label>
                <input type="text" name="editworkdesign" id="editworkdesign" value="" class="text ui-widget-content ui-corner-all">
                <label for="editworkstart">Start</label>
                <input type="text" name="editworkstart" id="editworkstart" value="" class="text ui-widget-content ui-corner-all">
                <label for="editworkend">End</label>
                <input type="text" name="editworkend" id="editworkend" value="" class="text ui-widget-content ui-corner-all">
                <label for="editworkemail">Email</label>
                <input type="text" name="editworkemail" id="editworkemail" value="" class="text ui-widget-content ui-corner-all">
                <label for="editworkcontact">Contact No</label>
                <input type="text" name="editworkcontact" id="editworkcontact" value="" class="text ui-widget-content ui-corner-all">

                <!-- Allow form submission with keyboard without duplicating the dialog button -->
                <input name="submit" type="submit" tabindex="-1" style="position:absolute; top:-1000px">
              </fieldset>
            </form>
          </div>

          <div id="deletework-dialog-confirm" title="Delete Work">
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?
            </p>
            <input type="text" name="deleteworkid" id="deleteworkid" value="">
                
            <!-- Allow form submission with keyboard without duplicating the dialog button -->
            <input name="submit" type="submit" tabindex="-1" style="position:absolute; top:-1000px">
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
  <script src="js/modalcreate.js"></script>
  <script src="js/modaldelete.js"></script>
  <script src="js/modaledit.js"></script>
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


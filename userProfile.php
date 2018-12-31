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

      <h1 id="fh5co-logo"><a href="alumniPage.php"><img src="images/logo.png" alt="Free HTML5 Bootstrap Website Template"></a></h1>
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
            <h1 class="fh5co-heading-colored">Login Info</h1>
          </div>
        </div>
        <div class="row">
          <div class="animate-box" data-animate-effect="fadeInLeft">

            <div id="updatepwd-dialog-form" title="Update Password Form">
              <p class="validateTips">All form fields are required.</p>
              <form>
                <fieldset>
                  <input type="hidden" id="holdpwd" value="<?php echo $row['Pwd'];?>" >
                  <label for="curr-pwd">Current Password</label>
                  <input type="password" name="curr-pwd" id="curr-pwd" class="text ui-widget-content ui-corner-all">
                  <label for="new-pwd">New Password</label>
                  <input type="password" name="new-pwd" id="new-pwd" class="text ui-widget-content ui-corner-all">
                  <label for="retype-pwd">Retype New Password</label>
                  <input type="password" name="retype-pwd" id="retype-pwd" class="text ui-widget-content ui-corner-all">
             
                  <!-- Allow form submission with keyboard without duplicating the dialog button -->
                  <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                </fieldset>
              </form>
            </div>

            <?php
              require 'connection.php';
              $hold = $_SESSION['login_id'];
              $result = mysql_query("SELECT * FROM alulogin WHERE RegNo = '".$hold."' ") or die(mysql_error());

                  $row = mysql_fetch_array($result);
            ?>

            <div id="users-contain" class="ui-widget" style="text-align: center;overflow-x:auto;margin:auto;width: 100%;padding: 10px;margin-top: 10px;">
              <table id="users" class="ui-widget ui-widget-content" style="width:100%;overflow-x:auto;margin:auto;padding: 10px;margin-top: 10px;">
                <thead>
                  <tr class="ui-widget-header" style="height: 50px;">
                    <th>Registration No</th>
                    <th>Username</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="record">
                    <td class="user-no"><?php echo $row['RegNo'];?></td>
                    <td class="user-name"><?php echo $row['UserName'];?></td>
                  </tr>
                <?php
                  $holdid = $row['RegNo'];
                  $userName = $row['UserName'];
                  mysql_close($connection); 
                ?>
                </tbody>
              </table>
              <button id="update-pwd" style="margin-top: 10px;">Update Password</button>
            </div>
          
          </div>
        </div>
      </div>

      <div class="fh5co-narrow-content">
        <div class="row">
          <div class="animate-box" data-animate-effect="fadeInLeft">
            <h1 class="fh5co-heading-colored">About</h1>
          </div>
        </div>
        <div class="row">
          <div class="animate-box" data-animate-effect="fadeInLeft">

            <?php
              require 'connection.php';
              $result = mysql_query("SELECT * FROM aludetail WHERE RegNo='".$holdid."' ");
            ?>

            <div id="users-contain" class="ui-widget" style="text-align: center;overflow-x:auto;margin:auto;width: 100%;padding: 10px;margin-top: 10px;">
              <table id="users" class="ui-widget ui-widget-content" style="width:100%;overflow-x:auto;margin:auto;padding: 10px;margin-top: 10px;">
                <thead>
                  <tr class="ui-widget-header" style="height: 50px;">
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Ic</th>
                    <th>Marital</th>
                    <th>Phone No</th>
                    <th>Email</th>
                    <th>JoinDate</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php
                  $row=mysql_fetch_assoc($result);
                ?>
                <tbody>
                  <tr id="record-detail">
                    <td id="user-fname"><?php echo $row['fName'];?></td>
                    <td id="user-lname"><?php echo $row['lName'];?></td>
                    <td id="user-gender"><?php echo $row['Gender'];?></td>
                    <td id="user-ic"><?php echo $row['Ic'];?></td>
                    <td id="user-marital"><?php echo $row['Marital'];?></td>         
                    <td id="user-phn"><?php echo $row['PhnNo'];?></td>
                    <td id="user-email"><?php echo $row['Email'];?></td>
                    <td id="user-joindate"><?php echo $row['JoinDate'];?></td>
                    <td id="user-id" style="display: none;"><?php echo $row['RegNo'];?></td>
                    <td>
                      <button id="edit-detail">Edit</button>
                    </td>
                  </tr>
                <?php
                  mysql_close($connection); 
                ?>
                </tbody>
              </table>
            </div>
            
            <div id="edituser-dialog-form" title="Update Alumni Detail">
              <p class="validateTips">All form fields are required.</p>
              <form>
                <fieldset>
                  <input type="hidden" id="editid" value="">
                  <label for="editfname">First Name</label>
                  <input type="text" name="editfname" id="editfname" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editlname">Last Name</label>
                  <input type="text" name="editlname" id="editlname" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editic">Ic</label>
                  <input type="text" name="editic" id="editic" value="" class="text ui-widget-content ui-corner-all">
              
              <div style="display: inline-table;">  
                <label for="editgender">Gender</label>
                <select name="editgender" id="editgender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select> 
              </div>
              <div style="display: inline-table;">
                  <label for="editmarital">Marital</label>
                  <select name="editmarital" id="editmarital">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widow">Widow</option>
                  </select>
              </div>
                  <label for="editphn">Phone No</label>
                  <input type="text" name="editphn" id="editphn" value="" class="text ui-widget-content ui-corner-all">
                  <label for="editemail">Email</label>
                  <input type="text" name="editemail" id="editemail" value="" class="text ui-widget-content ui-corner-all">
             
                  <!-- Allow form submission with keyboard without duplicating the dialog button -->
                  <input name="submit" type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                </fieldset>
              </form>
            </div>       
          
          </div>
        </div>
      </div>

      <div class="fh5co-narrow-content">
        <div class="row">
          <div class="animate-box" data-animate-effect="fadeInLeft">
            <h1 class="fh5co-heading-colored">Address</h1>
          </div>
        </div>
        <div class="row">
          <div class="animate-box" data-animate-effect="fadeInLeft">
                  
            <?php
              require 'connection.php';
              $id = $_SESSION['login_id'];
              $result = mysql_query("SELECT * FROM address WHERE lookId='".$id."' ");
            ?>

            <div id="users-contain" class="ui-widget" style="text-align: center;overflow-x:auto;margin:auto;width: 100%;padding: 10px;margin-top: 10px;">
              <table id="users" class="ui-widget ui-widget-content" style="width:100%;overflow-x:auto;margin:auto;padding: 10px;margin-top: 10px;">
                <thead>
                  <tr class="ui-widget-header" style="height: 50px;">
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php
                  $row=mysql_fetch_assoc($result);
                ?>
                <tbody>
                  <tr id="record-address">
                    <td>
                      <?php echo $row['line1'];?>
                      <?php echo $row['line2'];?>
                      <?php echo $row['poscode'];?>
                      <?php echo $row['city'];?>
                      <?php echo $row['district'];?>
                      <?php echo $row['state'];?>
                      <?php echo $row['country'];?>
                    </td>
                    <td id="address-id" style="display: none;"><?php echo $row['Id'];?></td>
                    <td id="address-line1" style="display: none;"><?php echo $row['line1'];?></td>
                    <td id="address-line2" style="display: none;"><?php echo $row['line2'];?></td>
                    <td id="address-poscode" style="display: none;"><?php echo $row['poscode'];?></td>
                    <td id="address-city" style="display: none;"><?php echo $row['city'];?></td>
                    <td id="address-district" style="display: none;"><?php echo $row['district'];?></td>
                    <td id="address-state" style="display: none;"><?php echo $row['state'];?></td>
                    <td id="address-country" style="display: none;"><?php echo $row['country'];?></td>
                    <td>
                      <button id="edit1-address">Edit</button>
                    </td>
                  </tr>
                <?php
                  mysql_close($connection); 
                ?>
                </tbody>
              </table>
            </div> 

            <div id="editaddress-dialog-form" title="Update Address">
              <p class="validateTips">All form fields are required.</p>
              <form>
                <fieldset>
                  <input type="hidden" name="editaddressid" id="editaddressid"> 
                  <label for="editline1">Address</label>
                  <input type="text" name="editline1" id="editline1" value="" class="text ui-widget-content ui-corner-all">
                  <input type="text" name="editline2" id="editline2" value="" class="text ui-widget-content ui-corner-all">
                  <div class="address-input1">
                    <label for="editposcode">Poscode</label>
                    <input type="text" name="editposcode" id="editposcode" value="" class="text ui-widget-content ui-corner-all">
                  </div>  
                  <div class="address-input">
                  <label for="editcity">City</label>
                    <input type="text" name="editcity" id="editcity" value="" class="text ui-widget-content ui-corner-all"> 
                  </div>
                  <div class="address-input">
                  <label for="editdistrict">District</label>
                  <input name="editdistrict" id="editdistrict" class="text ui-widget-content ui-corner-all"> 
                </div>  
                    
                  <label for="editstate">State</label>
                  <select name="editstate" id="editstate">
                    <option value="Selangor">Selangor</option>
                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                    <option value="Sarawak">Sarawak</option>
                    <option value="Johor">Johor</option>
                    <option value="Penang">Penang</option>
                    <option value="Sabah">Sabah</option>
                    <option value="Perak">Perak</option>
                    <option value="Pahang">Pahang</option>
                    <option value="Negeri Sembilan">Negeri Sembilan</option>
                    <option value="Kedah">Kedah</option>
                    <option value="Melaka">Melaka</option>
                    <option value="Terengganu">Terengganu</option>
                    <option value="Kelantan">Kelantan</option>
                    <option value="Perlis">Perlis</option>
                    <option value="Labuan">Labuan</option>
                  </select>

                  <label for="editcountry">Country</label>
                  <input type="text" name="editcountry" id="editcountry" value="" class="text ui-widget-content ui-corner-all">
             
                  <!-- Allow form submission with keyboard without duplicating the dialog button -->
                  <input name="submit" type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                </fieldset>
              </form>
            </div>
      
          </div>
        </div>
      </div>

      <div id="contact-dialog-form" title="Update Expertise">
        <p class="validateTips">
        Contact us at meow@al.com
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
  <script src="js/modalLogin.js"></script>
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


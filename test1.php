<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/themes/redmond/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/demo1.css">


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-ui.js"></script>

</head>
<body>
	<a href="#popupMenu" data-rel="popup" data-transition="slideup" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-gear ui-btn-icon-left ui-btn-a">Actions...</a>
	<div data-role="popup" id="popupMenu" data-theme="b">
	        <ul data-role="listview" data-inset="true" style="min-width:210px;">
	            <li data-role="list-divider">Choose an action</li>
	            <li><a href="#">View details</a></li>
	            <li><a href="#">Edit</a></li>
	            <li><a href="#">Disable</a></li>
	            <li><a href="#">Delete</a></li>
	        </ul>
	</div>
</body>
</html>
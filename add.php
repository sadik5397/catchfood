<?php  
include_once 'resource/session.php';
include_once 'resource/utilities.php';
include_once 'resource/database.php';
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Boilerplate</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->        
        <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
        <link rel="stylesheet" type="text/css" href="assets/css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/sweetalert2.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <script src="assets/js/jquery.min.js"></script>                
        <script src="assets/js/jquery-migrate.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/sweetalert2.min.js"></script>
        <script src='assets/lib/tinymce/tinymce.min.js'></script>
	    <script>
		  tinymce.init({
		    selector: '.wysig',
		    height: 500,
  theme: 'modern',
  plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
  image_advtab: true,
		  });
	    </script>
    </head>
    <body>

    		
    	
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
	       <nav class="nav-extended brown darken-4">
		    <div class="nav-wrapper container">
		      <a href="#" class="brand-logo">Logo</a>
		      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
		      <ul id="nav-mobile" class="right hide-on-med-and-down">
		        <li><a href="http://safjammed.me">SAFJAMMED</a></li>		        
		      </ul>
		      <ul class="side-nav" id="mobile-demo">
		        <li><a href="http://safjammed.me">SAFJAMMED</a></li>     
		        
		      </ul>
		    </div>
		    <div class="nav-content container">
		      <ul class="tabs tabs-transparent">
		        <li class="tab"><a class="active" href="#1">Restaurant Details</a></li>
		        <li class="tab"><a href="#2">Menu</a></li>
		        <li class="tab"><a href="#3">Schedules</a></li>
		        <li class="tab"><a href="#4">Contact Info</a></li>
		        <li class="tab"><a href="#5">Extras</a></li>
		      </ul>
		    </div>
		  </nav>
		  <div class="container">
		  	<?php include_once 'processors/parseRestaurantAdding.php'; ?>
		  	<div class="card-panel">
		  		<form class="col s12" action="" enctype="multipart/form-data" method="post">
		  <div id="1" class="col s12">
		  	<?php include_once 'parts/forms/restaurant-details.php'; ?>


		  	<div class="row">
			  	<a class="waves-effect waves-light btn right wow bounceInRight" onclick="$('ul.tabs').tabs('select_tab', 2);" style="visibility: visible; animation-name: bounceInRight;"><i class="material-icons right">navigate_next</i>Next Step</a>
		  	</div>

		  </div>
		  <div id="2" class="col s12">
		  	<?php include_once 'parts/forms/restaurant-menu.php'; ?>

		  	<div class="row">
			  	<a class="waves-effect waves-light btn left wow bounceInLeft" onclick="$('ul.tabs').tabs('select_tab', 1);" style="visibility: visible; animation-name: bounceInRight;"><i class="material-icons left">navigate_before</i>Previous Step</a>
			  	<a class="waves-effect waves-light btn right wow bounceInRight" onclick="$('ul.tabs').tabs('select_tab', 3);" style="visibility: visible; animation-name: bounceInRight;"><i class="material-icons right">navigate_next</i>Next Step</a>
		  	</div>
		  </div>
		  <div id="3" class="col s12">
		  	<?php include_once 'parts/forms/restaurant-schedules.php'; ?>

		  	<div class="row">
			  	<a class="waves-effect waves-light btn left wow bounceInLeft" onclick="$('ul.tabs').tabs('select_tab', 2);" style="visibility: visible; animation-name: bounceInRight;"><i class="material-icons left">navigate_before</i>Previous Step</a>
			  	<a class="waves-effect waves-light btn right wow bounceInRight" onclick="$('ul.tabs').tabs('select_tab', 4);" style="visibility: visible; animation-name: bounceInRight;"><i class="material-icons right">navigate_next</i>Next Step</a>
		  	</div>
		  </div>
		  <div id="4" class="col s12">
		  	<?php include_once 'parts/forms/restaurant-contact.php'; ?>

		  	<div class="row">
			  	<a class="waves-effect waves-light btn left wow bounceInLeft" onclick="$('ul.tabs').tabs('select_tab', 3);" style="visibility: visible; animation-name: bounceInRight;"><i class="material-icons left">navigate_before</i>Previous Step</a>
			  	<a class="waves-effect waves-light btn right wow bounceInRight" onclick="$('ul.tabs').tabs('select_tab', 5);" style="visibility: visible; animation-name: bounceInRight;"><i class="material-icons right">navigate_next</i>Next Step</a>
		  	</div>
		  </div>
		  <div id="5" class="col s12">
		  	<?php include_once 'parts/forms/restaurant-extra-adder.php'; ?>
		  	
		  	<div class="row">
			  	<a class="waves-effect waves-light btn left wow bounceInLeft" onclick="$('ul.tabs').tabs('select_tab', 4);" style="visibility: visible; animation-name: bounceInRight;"><i class="material-icons left">navigate_before</i>Previous Step</a>
			  	<button type="submit" name="addbtn" class="waves-effect waves-light btn right" style="visibility: visible;"><i class="material-icons left">check</i>Submit Form</button>
		  	</div>
		  </div>
		  </div>
		</form>
		  </div>
        
        
        
        <script src="assets/js/materialize.min.js"></script>
        <script src="assets/js/main.js"></script>                       
    </body>
</html>
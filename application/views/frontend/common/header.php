<html>
<head>
<meta charset="utf-8">
<title>Pqafu</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>frontend/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>frontend/css/font-awesome.css">
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
<link rel="stylesheet" href="<?=base_url()?>frontend/assets/css/style.css">
	
<link rel="stylesheet" type="text/css" href="<?=base_url()?>frontend/css/apps.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>frontend/css/apps_inner.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>frontend/css/res.css">
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
	
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script> -->



 <!-- <link rel="stylesheet" href="<?php //echo base_url(); ?>frontend/editor-summernote/libs/summernote-lite.css">  -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<style>
	* { box-sizing: border-box; }

.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9;
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important;
  color: #ffffff;
}
</style>
	

</head>

<body>
<div class="topbar">
<div class="wrapper">
<div class="col-sm-4 float-left topbar_left">
  <i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:info@pqafu.com"><span>info@pqafu.com</span></a>
</div>
<div class="col-sm-8 float-left topbar_right"> 
<span>India:</span> <a href="tel:+91-888-493-6263">+91-888-493-6263</a>
  <span>USA:</span> <a href="tel:1- 202-773-4993">+1-202-773-4993</a>
  <span>Uk:</span> <a href="tel:44-845-5942-993">+44-845-5942-993,</a>
  <span>Australia:</span> <a href="tel:61-730-678-993">+61-730-678-993</a>
</div>
</div>
</div>
<div class="wrapper">
	<div class="col-sm-12">
		<div class="responsiveLogoMenu">
		<?php	if(! $this->session->userdata('user_id')){ ?>
<a class="logoImgRes" href="<?=base_url()?>"><img src="<?=base_url()?>frontend/images/logo.jpg" alt=""></a>
<?php	}else{ ?>
<a class="logoImgRes" href="<?=base_url()?>user"><img src="<?=base_url()?>frontend/images/logo.jpg" alt=""></a>

	<?php	} ?>
			
			
		<a class="btn btn-primary open-menu btnResponsive" href="#" role="button">
                    <i class="fa fa-bars" aria-hidden="true"></i></a>
			<nav class="sidebar">
				
				<!-- close sidebar menu -->
				<div class="dismiss">
					<i class="fa fa-angle-left" aria-hidden="true"></i>



				</div>
				
				<div class="logoSidebar">
					<a href="#"><img src="images/logo.png" alt="" class="logoImg"/></a>
				</div>
				
				<ul class="list-unstyled menu-elements">


	 
	 <?php	if(! $this->session->userdata('user_id')){ ?>
	 	<li <?php	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	 	if($actual_link == base_url()){

	 		echo 'class="active"';

	 	} ?> >
		<a href="<?=base_url()?>">Home</a>
	</li>
	<?php	}else{ ?>
			<li <?php	if (strpos($_SERVER['REQUEST_URI'], "user") !== false){
                    echo 'class="active"';
}  ?> >
         <a href="<?=base_url()?>user">Home</a>

         </li>
	<?php	} ?>
	 
	 <li  <?php	if (strpos($_SERVER['REQUEST_URI'], "about") !== false){
                    echo 'class="active"';
}  ?>  >
		<a href="<?=base_url()?>about">About Us</a>
	 </li>
	  <li    <?php	if (strpos($_SERVER['REQUEST_URI'], "blog") !== false){
                    echo 'class="active"';
}  ?>   >
		<a href="<?=base_url()?>blog">Blog</a>
	 </li>
	 <li   <?php	if (strpos($_SERVER['REQUEST_URI'], "post_question") !== false){
                    echo 'class="active"';
}  ?>  >
		<a href="<?=base_url()?>post_question">Ask Your Questions</a>
	 </li>
  </ul>
				
				
				
			
			</nav>
			
		</div>
			
		
<nav class="navbar navbar-expand-lg navbar-light">
	 <?php	if(! $this->session->userdata('user_id')){ ?>
<a class="logoImg" href="<?=base_url()?>"><img src="<?=base_url()?>frontend/images/logo.jpg" alt=""></a>
<?php	}else{ ?>
<a class="logoImg" href="<?=base_url()?>user"><img src="<?=base_url()?>frontend/images/logo.jpg" alt=""></a>

	<?php	} ?>

<div class="rightNavSec">
  <ul class="desktopMenu">


	 
	 <?php	if(! $this->session->userdata('user_id')){ ?>
	 	<li <?php	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	 	if($actual_link == base_url()){

	 		echo 'class="active"';

	 	} ?> >
		<a href="<?=base_url()?>">Home</a>
	</li>
	<?php	}else{ ?>
			<li <?php	if (strpos($_SERVER['REQUEST_URI'], "user") !== false){
                    echo 'class="active"';
}  ?> >
         <a href="<?=base_url()?>user">Home</a>

         </li>
	<?php	} ?>
	 
	 <li  <?php	if (strpos($_SERVER['REQUEST_URI'], "about") !== false){
                    echo 'class="active"';
}  ?>  >
		<a href="<?=base_url()?>about">About Us</a>
	 </li>
	  <li    <?php	if (strpos($_SERVER['REQUEST_URI'], "blog") !== false){
                    echo 'class="active"';
}  ?>   >
		<a href="<?=base_url()?>blog">Blog</a>
	 </li>
	 <li   <?php	if (strpos($_SERVER['REQUEST_URI'], "post_question") !== false){
                    echo 'class="active"';
}  ?>  >
		<a href="<?=base_url()?>post_question">Ask Your Questions</a>
	 </li>
  </ul>
	<form class="form_inlineAfterLog" autocomplete="off" action="<?=base_url()?>search" id="myform" method="POST">
		<div class="autocomplete">
		<input type="text" class="form-control mr-sm-2" placeholder="Search Questions" aria-label="Search" id="search_text" name="search">
		<div  id="search_textautocomplete-list" class="autocomplete-items">
		<!-- <span id="search_textautocomplete-list"></span> -->
	    </div>
		 </div>
	 </form>

	 <!-- Suggestions will be displayed in below div. -->
   <!-- <div id="display" ></div> -->
    <?php if(!$this->session->userdata('user_id')){ ?>

	 <a href='<?=base_url()?>login' class="btn orgBtn" type="submit" onclick="">Sign In</a>
	<?php }else { ?>

		<div class="thumAfterLog">
<!--		<img src="images/c1.jpg" alt="...">-->
		<?php if(strlen($this->session->userdata('user_pic')) < 10 ){  ?>
	<a onclick="myFunction()" class="dropbtn loginThumb" style="background: url('<?=base_url()?>frontend/images/listDefault.png') no-repeat center center; background-size: cover;">&nbsp;</a>

	<?php	}else { ?>
		<a onclick="myFunction()" class="dropbtn loginThumb" style="background: url('<?=base_url()?>uploads/profile/<?php echo $this->session->userdata('user_pic') ?>') no-repeat center center; background-size: cover;">&nbsp;</a>

	<?php } ?>
	
	<div id="myDropdown" class="dropdown-content">
    <a href="<?=base_url()?>user/myquestion"><i class="fa fa-user-o" aria-hidden="true"></i> My Profile</a>
   <!--  <a href="#about"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Change Password</a> -->
    <a href="<?=base_url()?>auth/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
  </div>
		
	</div>
			
		<!-- <div class="thumAfterLog"><img src="<?=base_url()?>frontend/images/c1.jpg" alt="...">
			<ul>
			   <li> <a href="<?=base_url()?>auth/logout">logout</a></li>
			</ul>
		</div> -->
	
	   <?php    } ?>
	 
</div>
</nav>


	</div>
</div>
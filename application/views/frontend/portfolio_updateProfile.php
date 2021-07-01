<div class="breadcrumb">
	<ul>
<li><a href="<?=base_url()?>user">Home</a></li>  <li>&gt;</li>  
<li>Update Profile</li>
</ul>
	</div>

<div class="bodyContainer">
<div class="wrapper">
	
<?php $this->load->view('frontend/common/sidebar');?>

<div class="col-sm-9 float-left">
	<div class="rightsideSection shadoSection">
	<h1>Update Profile</h1>

	<div class="row placeOrderform">

		<div class="col-sm-12">
	<div class="form-group">
		<div class="oldPassDiv">
		<form action="" method="post" enctype="multipart/form-data">
    <label>Profile Picture</label>
    <div class="inputWraper2">
   
		<input type="file" class="form-control" name="profile_pic"> 
		<input type="hidden" class="form-control" name="pic" value="<?=$user->profile_picture?>">
		</div>
		</div>
  	</div>
	</div>
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" placeholder="First Name" name="first_name" value="<?=$user->first_name?>">
  	</div>
	</div>	
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="<?=$user->last_name?>">
  	</div>	
	</div>			
	
    <br clear="all">
		

		
	<div class="col-sm-12 float-left">
	<div class="form-group">
    <input type="submit" class="btn btnRed" value="Submit">
  	</div>
	</div>
	</form>
	</div>
		
		
	</div>
</div>
	
	<br clear="all">

</div>
</div>



<footer class="footer-area Copyright">
         <div class="col-md-12 text-center pt-4">
            <p>Copyright © 2021 | Pqafu | All Rights Reserved</p>
         </div>
</footer>




	
<script src="js/bootstrap.min.js"></script>

</body>
</html>

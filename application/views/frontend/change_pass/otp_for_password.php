<div class="breadcrumb">
	<ul>
<li><a href="#">Home</a></li>  <li>&gt;</li>  
<li>Sign In</li>
</ul>
	</div>

<div class="bodyContainer">
<div class="wrapper">
<div class="col-sm-12 loginBody">

 <form action="<?=base_url()?>auth/forgot_password" method="POST">
	<div class="loginWraper">
	<div class="col-sm-12">
		<h1>Give Your Regestered Email</h1>
	<div class="form-group">
    <label class="inputWraper"><i class="fa fa-envelope-o" aria-hidden="true"></i>
   <input type="email" class="form-control" placeholder="Email" name="email" ></label>
  </div>
	
		
	<div class="form-group">
	    
	 <input type="submit" class="btn btnRed widthFull" value="SUBMIT">
	 </div>
		
	<p>Not a member? <a href="<?php echo base_url()?>signup">Sign up now</a></p>
		
	</div>
	</div>
</div>
</div>
</div>
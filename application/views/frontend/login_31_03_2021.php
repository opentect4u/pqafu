<div class="breadcrumb">
	<ul>
<li><a href="#">Home</a></li>  <li>&gt;</li>  
<li>Login</li>
</ul>
	</div>

<div class="bodyContainer">
<div class="wrapper">
<div class="col-sm-12 loginBody">

 <form action="<?=base_url()?>auth/login" method="POST">
	<div class="loginWraper">
	<div class="col-sm-12">
		<h1>Login</h1>
		<span class="confirm-div" style="float:right; color:green;"><?php if(null != $this->session->flashdata('msg')) 
                  { echo $this->session->flashdata('msg');};?>
                      
                  </span>
	<div class="form-group">
    <label class="inputWraper"><i class="fa fa-envelope-o" aria-hidden="true"></i>
   <input type="email" class="form-control" placeholder="Email" name="email" required></label>
  </div>
		<div class="form-group">
    <label class="inputWraper"><i class="fa fa-lock" aria-hidden="true"></i>
    <input type="password" class="form-control" placeholder="Password" name="password" required></label>
    </div>	
		
		<div class="checkBoxCustomeMain">
			<label class="checkBoxCustom">
	<input type="checkbox" checked="checked">
	<span class="checkmarkText"></span>
	</label>Remember</div>
		<div class="captureMain">
        <div class="captureCode"><?=$captchaImg?></div>
		<div class="captureInput">
    <label class="inputWraper">
    <input type="text" class="capField" placeholder="captcha" name="captcha" ></label>
    </div></div>
	<div class="form-group">
	    
	 <input type="submit" class="btn btnRed widthFull" value="LOGIN">
	 </div>
	</form>
		<p><a href="<?php echo base_url()?>auth/forgot_password">Forgot Password</a></p>
	<p>Not a member? <a href="<?php echo base_url()?>signup">Sign up now</a></p>
		
	</div>
	 <br clear="all">

	</div>
</div>
</div>
</div>
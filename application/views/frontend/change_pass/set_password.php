<div class="breadcrumb">
	<ul>
<li><a href="#">Home</a></li>  <li>&gt;</li>  
<li>Change Password</li>
</ul>
	</div>

<div class="bodyContainer">
<div class="wrapper">
<div class="col-sm-12 loginBody">
	<div class="loginWraper">
	<div class="col-sm-12">
		<h1>Change Password</h1>
		 <span class="confirm-div" style="float:right; color:green;"><?php if(null != $this->session->flashdata('password_update')) 
                  { echo $this->session->flashdata('password_update');};?>
                      
                  </span>
         <form action="<?=base_url()?>auth/password_update" method="POST">
	    <div class="form-group">
		
	      <input type="hidden" value="<?=$email?>" name="email">
			<div class="form-group">
	     <label class="inputWraper"><i class="fa fa-lock" aria-hidden="true"></i>
	     <input type="password" class="form-control" placeholder="Password" name="password" id="pswd1" required></label>
	     </div>
			<div class="form-group">
	     <label class="inputWraper"><i class="fa fa-lock" aria-hidden="true"></i>
	     <input type="password" class="form-control" placeholder="Confirm Password" name="passwords" id="pswd2"></label>
	    </div>
			
		<div class="form-group">
			<?php if(null == $this->session->flashdata('password_update')) 
                  { ?>
		<input type="submit" class="btn btnRed widthFull" onclick="return matchPassword()" value="Sign up now">
		<?php } ?>
		</div>
    </form>
	</div>
	</div>
</div>
</div>
</div>
<script>  
function matchPassword() {  
  var pw1 = document.getElementById("pswd1").value;  
  var pw2 = document.getElementById("pswd2").value;  

  console.log(pw1);
  if(pw1 != pw2)  
  {   
    alert("Passwords did not match");  
    return false;  
  } else {  
    alert("Password created successfully");  
     return true;
  }  
}  
</script> 
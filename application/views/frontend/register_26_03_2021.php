<div class="breadcrumb">
	<ul>
<li><a href="#">Home</a></li>  <li>&gt;</li>  
<li>Sign Up</li>
</ul>
	</div>

<div class="bodyContainer">
<div class="wrapper">
<div class="col-sm-12 loginBody">
	<div class="loginWraper">
	<div class="col-sm-12">
		<h1>Sign Up</h1>
		 <span class="confirm-div" style="float:right; color:green;"><?php if(null != $this->session->flashdata('msg')) 
                  { echo $this->session->flashdata('msg');};?>
                      
                  </span>
         <form action="<?=base_url()?>auth/signup" method="POST">
	    <div class="form-group">
		
	      <label class="inputWraper"><i class="fa fa-user" aria-hidden="true"></i>
	      <input type="type" class="form-control" placeholder="First Name" name="name" required></label>
	    </div>
	     <div class="form-group">
	      <label class="inputWraper"><i class="fa fa-user" aria-hidden="true"></i>
	      <input type="type" class="form-control" placeholder="Last Name" name="lname" required></label>
	    </div>
		<div class="form-group">
	     <label class="inputWraper"><i class="fa fa-envelope-o" aria-hidden="true"></i>
	     <input type="email" class="form-control" placeholder="Email" name="email" required></label>
	     </div>
			<div class="form-group">
	     <label class="inputWraper"><i class="fa fa-lock" aria-hidden="true"></i>
	     <input type="password" class="form-control" placeholder="Password" name="password" id="pswd1" required></label>
	     </div>
			<div class="form-group">
	     <label class="inputWraper"><i class="fa fa-lock" aria-hidden="true"></i>
	     <input type="password" class="form-control" placeholder="Confirm Password" name="passwords" id="pswd2"></label>
	    </div>

		<div class="checkBoxCustomeMain">
			<label class="checkBoxCustom">
	    <input type="checkbox" checked="checked"  disabled="">
	    <span class="checkmarkText"></span>
	    </label>
			<a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">Terms & Condition Apply</a></div>
            
        <div class="captureMain">
        <div class="captureCode"><?=$captchaImg?></div>
		<div class="captureInput">
    <label class="inputWraper">
    <input type="text" class="form-control" placeholder="captcha" name="captcha" ></label>
    </div></div>
    
            
            <?php /*?><div><?=$captchaImg?></div>
		<div class="form-group">
    <label class="inputWraper">
    <input type="text" class="form-control" placeholder="captcha" name="captcha" ></label>
    </div><?php */?>
		<div class="form-group">
		<input type="submit" class="btn btnRed widthFull" onclick="return matchPassword()" value="Sign up now">
		</div>
    </form>
		
		

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modalDialogTerms">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Terms and Conditions</h4>
        </div>
        <div class="modal-body">
          <p>Our Terms and Conditions are mentioned below. Please go through them and reach out to us for any query.	  </p>

	  <ul>
		  <li>You own the content you post and are responsible for the content you post</li>
<li>We do not endorse or verify content posted by users</li>
<li>You must be over 13 years of age to use our forum	  </li>
<li>You must accurate information when you register with us	  </li>
<li>You may close your account at any time you wish	  </li>
<li>You can provide feedback to us or get in touch at any time	  </li>
<li>By posting content on our website, you agree to our terms and conditions and privacy policies. You also grant our forum and our affiliated companies license to use, copy or reproduce your content in connection with the operation of the pqfa platform</li>
<li>You also agree to let pqfa preserve your content and disclose your content and related information by the law or to protect rights, property or personal safety of our forum	  </li>
<li>You also grant us permission to take action against any unauthorized use by third parties or any of your content outside of the forum or in violation of our terms and conditions	  </li>
<li>Sometimes third parties post ads or content on our forum. We make no warranties or verification or endorsements about the accuracy of the content posted by these third parties	  </li>
<li>Our logo and information posted by us on the forum is our copyright and cannot be used any other person	  </li>
<li>For information on our privacy policies, please visit our privacy policies section</li>
<li>We may change our terms and conditions as and when required</li>

</ul>
<p>By using our website, you agree to abide by our Terms and Conditions and Privacy Policies.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
		
		
	</div>
		<br clear="all">

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
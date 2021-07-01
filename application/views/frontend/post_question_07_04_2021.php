<div class="breadcrumb">
	<ul>
<li><a href="<?=base_url()?>">Home</a></li>  <li>&gt;</li>  
<li>Update Profile</li>
</ul>
	</div>

<div class="bodyContainer">
<div class="wrapper">
	
<?php $this->load->view('frontend/common/sidebar');?>

<div class="col-sm-9 float-left">
	<div class="rightsideSection shadoSection">
	<h1>Post Question</h1>     
	<span class="confirm-div" style="float:right; color:green;"><?php if(null != $this->session->flashdata('msg')) 
                  { echo $this->session->flashdata('msg');};?>
                      
                  </span>
	 
  <form action="<?=base_url()?>user/post_question" method="POST">
		<div class="row placeOrderform">
			<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Category</label>
   <select class="form-control" name="cat_id" required>
        	<option value="">Select</option>
        	<?php foreach($category as $cat){?>
        	<option value="<?php if(isset($cat->id)){ echo $cat->id;} ?>"><?php if(isset($cat->cat_name)){ echo $cat->cat_name;} ?></option>
             <?php }?>
        </select>
  	</div>
	</div>
		<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Grade</label>
   <select class="form-control" name="grade_id" required>
        	<option value="">Select</option>
        	<?php foreach($grade as $gra){?>
     <option value="<?php if(isset($gra->id)){ echo $gra->id;} ?>"><?php if(isset($gra->grade_name)){ echo $gra->grade_name;} ?></option>
             <?php }?>
        </select>
  	</div>	
	</div>	
       

			<div class="col-sm-12">
			<div class="form-group">
	<label>Question</label>
		 <!--    <input type="text" class="form-control" placeholder="Name"  name="question" > -->
		<!--  <textarea id="summernote" class="form-control summernote" name="question"></textarea> -->
         <textarea id="" class="form-control" name="question" required></textarea>
		
		  	</div>
			</div>	
			
			<br clear="all">
			<div class="col-sm-12 float-left">
				<div class="col-md-3">
				<div class="form-group">
			      <?=$captchaImg?>
			  	</div>
			     </div>
			     <div class="col-md-3">
				<div class="form-group">
			    <input type="text" class="form-control" value="" name="captcha" >
			  	</div>
			     </div>
			</div>
			
			<div class="col-sm-12 float-left">
			<div class="form-group">
		    <input type="submit" class="btn btnRed" value="Submit">
		  	</div>
			</div>
		
		</div>
	</form>	
	</div>
   </div>
	
	<br clear="all">

</div>
</div>
<div class="breadcrumb">
	<ul>
<li><a href="<?=base_url()?>user">Home</a></li>  <li>&gt;</li>  
<li>Place Order</li>
</ul>
	</div>

<div class="bodyContainer">
<div class="wrapper">
<?php $this->load->view('frontend/common/sidebar');?>

<div class="col-sm-9 float-left">
	<div class="rightsideSection shadoSection">
	<h1>Place Order</h1>
		
	<p class="notes">Notes*: Order plagiarism free content at <span>$8.99/page</span></p>
		
	<div class="row placeOrderform">
   <form action="<?=base_url()?>user/order" method="POST" id="form"  enctype="multipart/form-data">
	   
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Phone/Mobile</label>
    <input type="tel" class="form-control" name="phone" value="<?php if(isset($orders->phone)){ echo $orders->phone ;}?>" readonly>
  	</div>
	</div>	
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Time Zone <span class="manditory">*</span></label>
       <input type="text" class="form-control" name="" required="" value="<?php if(isset($orders->timezone)){ echo $orders->timezone ;}?>" readonly>
	
		
  	</div>	
	</div>	
	  
	<div class="col-sm-12 float-left">
	<div class="form-group">
    <label>Topic <span class="manditory">*</span></label>
    <input type="text" class="form-control" name="topic" required="" value="<?php if(isset($orders->topic)){ echo $orders->topic ;}?>" readonly>
  	</div>
	</div> 
	   
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Grade <span class="manditory">*</span></label>
     
      <input type="text" class="form-control" name="" required="" value="<?php if(isset($orders->grade)){ echo $orders->grade ;}?>" readonly>
	
   <!--  <select class="form-control" name="grade" required>
		<option selected="selected" value="Select your grade">Select your grade</option>
		<option value="High school">High school</option>
		<option value="College">College</option>
		<option value="Bachelor">Bachelor</option>
		<option value="Engineering">Engineering</option>
		<option value="Masters">Masters</option>
		<option value="PhD">PhD</option>
		<option value="Thesis">Thesis</option>
		<option value="Research">Research</option>
		<option value="Other">Other</option>
	</select> -->
  	</div>
	</div>
	   
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Assignment Type <span class="manditory">*</span></label>
    <input type="text" class="form-control" name="" required="" value="<?php if(isset($orders->assigntype)){ echo $orders->assigntype ;}?>" readonly>
	<!-- <select class="form-control" name="assigntype" required>
		<option selected="selected" value="Assignment type">Assignment type</option>
		<option value="Assignment">Assignment</option>
		<option value="Business Proposal">Business Proposal</option>
		<option value="Case Study">Case Study</option>
		<option value="Complete Dissertation">Complete Dissertation</option>
		<option value="Dissertation Proposal">Dissertation Proposal</option>
		<option value="Essay">Essay</option>
		<option value="Essay Services- Editing">Essay Services- Editing</option>
		<option value="PowerPoint Presentation">PowerPoint Presentation</option>
		<option value="Research Paper">Research Paper</option>
		<option value="Term Paper">Term Paper</option>
		<option value="Thesis">Thesis</option>

	</select> -->
  	</div>
	</div>
		
		
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Word Count <span class="manditory">*</span></label>
	 <select class="form-control" name="max_words" required disabled>
  	<option value="">Select Words Limit</option>
    <option value="1" <?php if($orders->max_words == '1'){ echo "selected" ; } ?> >500 Words</option>
    <option value="2" <?php if($orders->max_words == '2'){ echo "selected" ; } ?> >1000 Words</option>
    <option value="3" <?php if($orders->max_words == '3'){ echo "selected" ; } ?> >1500 Words Limit</option>
    <option value="4" <?php if($orders->max_words == '4'){ echo "selected" ; } ?> >2000 Words</option>
   </select>
  	</div>
	</div> 
	   
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Dead Line</label>
    
     <input type="text" class="form-control" name="" required="" value="<?php if(isset($orders->order_dead_line)){ echo $orders->order_dead_line ;}?>" readonly>
	<!-- <select class="form-control" name="order_dead_line" required>
		<option selected="selected" value="Select deadline">Select deadline</option>
		<option value="1 Days">1 Days</option>
		<option value="2 Days">2 Days</option>
		<option value="3 Days">3 Days</option>
		<option value="4 Days">4 Days</option>
		<option value="5 Days">5 Days</option>
		<option value="6-10 Days">6-10 Days</option>
		<option value="10-20 Days">10-20 Days</option>
		<option value="20+ Days">20+ Days</option>

	</select> -->
  	</div>	
	</div>
		
	<div class="col-sm-12 float-left">
	<div class="form-group">
    <label>Description</label>
    <textarea class="form-control" rows="3" name="order_description" readonly><?php if(isset($orders->order_description)){ echo $orders->order_description ;}?></textarea>
  	</div>
	</div>
	   
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Download  <span class="manditory"><!-- *</span> <span>(jpg, png, maximum size: 2mb)</span> --></label><br>
    <?php if(strlen($orders->order_image) > 12){?>
     <a href="<?=base_url()?>uploads/order/<?php if(isset($orders->order_image)){ echo $orders->order_image ;}?>" download>
     	Download
    </a> 
    <?php } ?>
   <!--  <input type="file" class="form-control" name="order_image" > -->
  	</div>
	</div>	
	   
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Download  <span class="manditory"><!-- *</span> <span>(jpg, png, maximum size: 2mb)</span> --></label>
     <?php if(strlen($orders->order_image1) > 12){?>
    <a href="<?=base_url()?>uploads/order/<?php if(isset($orders->order_image1)){ echo $orders->order_image1 ;}?>" download><br>
     <!--  <image src="<?=base_url()?>uploads/order/<?php //if(isset($orders->order_image1)){ echo $orders->order_image1 ;}?>"  style="height:200px! important"> -->
     	Download
      </a>
         <?php } ?>
   <!--  <input type="file" class="form-control" name="order_image1" > -->
  	</div>
	</div>
	   
<!-- 	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Upload Question 3 <span class="manditory">*</span> <span>(jpg, png, maximum size: 2mb)</span></label>
    <input type="file" class="form-control" name="question3" >
  	</div>
	</div> -->
<!--
	
	<div class="col-sm-12 checkBoxTerms">
	<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1"> I accept the <a href="#">Terms and Conditions</a></label>
  	</div></div>
-->
		
	<div class="col-sm-12 float-left">
	<!-- <div class="form-group">
    <input type="submit" class="btn btnRed" value="Submit">
  	</div>
	</div> -->
	</form>
	</div>
		
	</div>
</div>
	
	<br clear="all">

</div>
</div>

<script>

$('#form').submit(function(event){
           
                var trans_dt = $('#order_dead_line').val();
         
var d = new Date();

 var month = d.getMonth()+1;
 var day = d.getDate();

 var output = d.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + day;

                    if(new Date(output) > new Date(trans_dt)){

                      alert("Deadline Date Can Not Be Less Than Current Date");
                      event.preventDefault();
                    }
                     else 
                        {
                    //  alert("Transaction Date Can Not Be Less Than order Date");

                       $('#submit').attr('type', 'submit');
                       
                      }
   
            });
</script>
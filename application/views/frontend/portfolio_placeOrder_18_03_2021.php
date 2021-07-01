<div class="breadcrumb">
	<ul>
<li><a href="<?=base_url()?>">Home</a></li>  <li>&gt;</li>  
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
    <label>Upload Question* <span>(jpg, png, maximum size: 2mb)</span></label>
    <input type="file" class="form-control" name="order_image" >
  	</div>
	</div>	
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Dead Line</label>
    <input type="date" class="form-control" name="order_dead_line" id="order_dead_line" value="<?php echo date('Y-m-d'); ?>">
  	</div>	
	</div>	
		
	
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Words</label>
    <select class="form-control" name="max_words" required>
  	<option value="">Select Words Limit</option>
    <option value="1">500 Words</option>
    <option value="2">1000 Words</option>
    <option value="3">1500 Words Limit</option>
    <option value="4">2000 Words</option>
   </select>
  	</div>
	</div>
		
	<div class="col-sm-12 float-left">
	<div class="form-group">
    <label>Description</label>
    <textarea class="form-control" rows="3" name="order_description"></textarea>
  	</div>
	</div>
		
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
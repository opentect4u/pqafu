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
		
	<p class="notes">Notes*: Order plagiarism free content at <span>$<?=$orderrate->amt?>/page</span></p>
		
	<div class="row placeOrderform">
   <form action="<?=base_url()?>user/order" method="POST" id="form"  enctype="multipart/form-data">
	   
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Phone/Mobile</label>
    <input type="tel" class="form-control" name="phone" >
  	</div>
	</div>	
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Time Zone <span class="manditory">*</span></label>
	<select class="form-control" name="timezone" required>
	<option selected="selected" value="">Time Zone</option>
	<option value="GMT -12:00 Eniwetok,Kwajalein">GMT -12:00 Eniwetok,Kwajalein</option>
	<option value="GMT -11:00 Samoa Standard Time(samoa)">GMT -11:00 Samoa Standard Time(samoa)</option>
	<option value="GMT -10:00 Hawaii Standard Time(honolulu)">GMT -10:00 Hawaii Standard Time(honolulu)</option>
	<option value="GMT -9:00 Alaska Standard Time(anchorage)">GMT -9:00 Alaska Standard Time(anchorage)</option>
	<option value="GMT -8:00 Pacific Standard Time(san Francisco)">GMT -8:00 Pacific Standard Time(san Francisco)</option>
	<option value="GMT -7:00 Mountain Standard Time(arizona)">GMT -7:00 Mountain Standard Time(arizona)</option>
	<option value="GMT -7:00 Mountain Standard Time(denver)">GMT -7:00 Mountain Standard Time(denver)</option>
	<option value="GMT -6:00 South/Latin America Central Time">GMT -6:00 South/Latin America Central Time</option>
	<option value="GMT -6:00 Central Standard Time(chicago)">GMT -6:00 Central Standard Time(chicago)</option>
	<option value="GMT -6:00 Mexico Standard Time(mexico City)">GMT -6:00 Mexico Standard Time(mexico City)</option>
	<option value="GMT -6:00 Central Standard Time(saskachewan)">GMT -6:00 Central Standard Time(saskachewan)</option>
	<option value="GMT -5:00 S.America Pacific Standard Time(bogota)">GMT -5:00 S.America Pacific Standard Time(bogota)</option>
	<option value="GMT -5:00 Eastern Standard Time(new York)">GMT -5:00 Eastern Standard Time(new York)</option>
	<option value="GMT -5:00 Eastern Standard Time(indiana)">GMT -5:00 Eastern Standard Time(indiana)</option>
	<option value="GMT -4:00 Atlantic Standard Time(halifax)">GMT -4:00 Atlantic Standard Time(halifax)</option>
	<option value="GMT -4:00 S.America Western Standard Time">GMT -4:00 S.America Western Standard Time</option>
	<option value="GMT -4:00 Santiago">GMT -4:00 Santiago</option>
	<option value="GMT -3:30 Newfoundland Standard Time(foundland)">GMT -3:30 Newfoundland Standard Time(foundland)</option>
	<option value="GMT -3:30 S.America Eastern Standard Time">GMT -3:30 S.America Eastern Standard Time</option>
	<option value="GMT -3:30 S.America Eastern Day Time (brasilia)">GMT -3:30 S.America Eastern Day Time (brasilia)</option>
	<option value="GMT -3:30 Greenland">GMT -3:30 Greenland</option>
	<option value="GMT -3:30 Mid-Atlantic Standard Time (atlantic)">GMT -3:30 Mid-Atlantic Standard Time (atlantic)</option>
	<option value="GMT -1:00 Azores Standard Time (azores)">GMT -1:00 Azores Standard Time (azores)</option>
	<option value="GMT -1:00 Cape Verde Is.">GMT -1:00 Cape Verde Is.</option>
	<option value="GMT 0:00 Gmt Standard Time (london)">GMT 0:00 Gmt Standard Time (london)</option>
	<option value="GMT +1:00 Europe Standard Time (amsterdam)">GMT +1:00 Europe Standard Time (amsterdam)</option>
	<option value="GMT +1:00 Europe Standard Time (paris)">GMT +1:00 Europe Standard Time (paris)</option>
	<option value="GMT +1:00 Europe Standard Time (pargue)">GMT +1:00 Europe Standard Time (pargue)</option>
	<option value="GMT +1:00 Europe Standard Time (berlin)">GMT +1:00 Europe Standard Time (berlin)</option>
	<option value="GMT +2:00 West Central Africa">GMT +2:00 West Central Africa</option>
	<option value="GMT +2:00 Greece Standard Time (athens)">GMT +2:00 Greece Standard Time (athens)</option>
	<option value="GMT +2:00 Eastern Europe Standard Time(bucharest)">GMT +2:00 Eastern Europe Standard Time(bucharest)</option>
	<option value="GMT +2:00 Egypt Standard Time (cairo)">GMT +2:00 Egypt Standard Time (cairo)</option>
	<option value="GMT +2:00 South Africa Standard Time (pretoria)">GMT +2:00 South Africa Standard Time (pretoria)</option>
	<option value="GMT +2:00 Northern Europe Standard Time(helsinki)">GMT +2:00 Northern Europe Standard Time(helsinki)</option>
	<option value="GMT +2:00 Israel Standard Time (tel Aviv)">GMT +2:00 Israel Standard Time (tel Aviv)</option>
	<option value="GMT +3:00 Saudi Arabia Standard Time (baghdad)">GMT +3:00 Saudi Arabia Standard Time (baghdad)</option>
	<option value="GMT +3:00 Kuwait, Riyadh">GMT +3:00 Kuwait, Riyadh</option>
	<option value="GMT +3:00 Russian Standard Time (moscow)">GMT +3:00 Russian Standard Time (moscow)</option>
	<option value="GMT +3:00 Nairobi Standard Time (nairobi)">GMT +3:00 Nairobi Standard Time (nairobi)</option>
	<option value="GMT +3:30 Iran Standard Time (tehran)">GMT +3:30 Iran Standard Time (tehran)</option>
	<option value="GMT +4:00 Arabian Standard Time (abu Dhabi)">GMT +4:00 Arabian Standard Time (abu Dhabi)</option>
	<option value="GMT +4:00 Baku Standard Time (baku)">GMT +4:00 Baku Standard Time (baku)</option>
	<option value="GMT +4:30 Afghanistan Standard Time (kabul)">GMT +4:30 Afghanistan Standard Time (kabul)</option>
	<option value="GMT +5:00 West Asia Standard Time (ekaterinburg)">GMT +5:00 West Asia Standard Time (ekaterinburg)</option>
	<option value="GMT +5:00 West Asia Standard Time (islamabad)">GMT +5:00 West Asia Standard Time (islamabad)</option>
	<option value="GMT +5:30 India Standard Time (New Delhi)">GMT +5:30 India Standard Time (New Delhi)</option>
	<option value="GMT +5:30 Colombo Standard Time (colombo)">GMT +5:30 Colombo Standard Time (colombo)</option>
	<option value="GMT +5:45 Kathmandu">GMT +5:45 Kathmandu</option>
	<option value="GMT +6:00 Central Asia Standard Time (almaty)">GMT +6:00 Central Asia Standard Time (almaty)</option>
	<option value="GMT +6:00 (astana) (dhaka)">GMT +6:00 (astana) (dhaka)</option>
	<option value="GMT +6:00 Sri Jayawardenepura">GMT +6:00 Sri Jayawardenepura</option>
	<option value="GMT +6:30 Rangoon">GMT +6:30 Rangoon</option>
	<option value="GMT +7:00 Bangkok Standard Time (bangkok)">GMT +7:00 Bangkok Standard Time (bangkok)</option>
	<option value="GMT +7:00 Krasnoyarsk">GMT +7:00 Krasnoyarsk</option>
	<option value="GMT +8:00 China Standard Time (beijing)">GMT +8:00 China Standard Time (beijing)</option>
	<option value="GMT +8:00 (irkutsk) Ulaan Bataar">GMT +8:00 (irkutsk) Ulaan Bataar</option>
	<option value="GMT +8:00 Australia Western Standard Time (perth)">GMT +8:00 Australia Western Standard Time (perth)</option>
	<option value="GMT +8:00 Singapore Standard Time (singapore)">GMT +8:00 Singapore Standard Time (singapore)</option>
	<option value="GMT +8:00 Taipei Standard Time (hong Kong)">GMT +8:00 Taipei Standard Time (hong Kong)</option>
	<option value="GMT +9:00 Tokyo Standard Time (tokyo)">GMT +9:00 Tokyo Standard Time (tokyo)</option>
	<option value="GMT +9:00 Korea Standard Time (seoul)">GMT +9:00 Korea Standard Time (seoul)</option>
	<option value="GMT +9:00 Yakutsk Standard Time (yakutsk)">GMT +9:00 Yakutsk Standard Time (yakutsk)</option>
	<option value="GMT +9:30 Australia Central Day Time (adelaide)">GMT +9:30 Australia Central Day Time (adelaide)</option>
	<option value="GMT +9:30 Australia Central Standard Time (darwin)">GMT +9:30 Australia Central Standard Time (darwin)</option>
	<option value="GMT +10:00 Australia Standard Time (brisbane)">GMT +10:00 Australia Standard Time (brisbane)</option>
	<option value="GMT +10:00 Australia Eastern Day Time (sydney)">GMT +10:00 Australia Eastern Day Time (sydney)</option>
	<option value="GMT +10:00 West Pacific Standard Time (guam)">GMT +10:00 West Pacific Standard Time (guam)</option>
	<option value="GMT +10:00 Tasmania Daylight Time (hobart)">GMT +10:00 Tasmania Daylight Time (hobart)</option>
	<option value="GMT +10:00 Vladivostok Stand Time (vladivostok)">GMT +10:00 Vladivostok Stand Time (vladivostok)</option>
	<option value="GMT +11:00 Central Pacific Stand Time (solomon)">GMT +11:00 Central Pacific Stand Time (solomon)</option>
	<option value="GMT +12:00 Fiji Standard Time (fiji)">GMT +12:00 Fiji Standard Time (fiji)</option>
	<option value="GMT +12:00 New Zealand Day Time (wellington)">GMT +12:00 New Zealand Day Time (wellington)</option>

</select>
		
  	</div>	
	</div>	
	  
	<div class="col-sm-12 float-left">
	<div class="form-group">
    <label>Topic <span class="manditory">*</span></label>
    <input type="text" class="form-control" name="topic" required="">
  	</div>
	</div> 
	   
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Grade <span class="manditory">*</span></label>
    <select class="form-control" name="grade" required>
		<option selected="selected" value="">Select your grade</option>
		<option value="High school">High school</option>
		<option value="College">College</option>
		<option value="Bachelor">Bachelor</option>
		<option value="Engineering">Engineering</option>
		<option value="Masters">Masters</option>
		<option value="PhD">PhD</option>
		<option value="Thesis">Thesis</option>
		<option value="Research">Research</option>
		<option value="Other">Other</option>
	</select>
  	</div>
	</div>
	   
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Assignment Type <span class="manditory">*</span></label>
	<select class="form-control" name="assigntype" required>
		<option selected="selected" value="">Assignment type</option>
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

	</select>
  	</div>
	</div>
		
		
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Word Count <span class="manditory">*</span></label>
	<select class="form-control" name="wordsCount" required>
  	<option value="">Select Words Limit</option>
    <option value="1">500 Words</option>
    <option value="2">1000 Words</option>
    <option value="3">1500 Words Limit</option>
    <option value="4">2000 Words</option>
   </select>
  	</div>
	</div> 
	   
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Dead Line</label>
    <?php /*?><input type="date" class="form-control" name="order_dead_line" id="order_dead_line" value="<?php echo date('Y-m-d'); ?>"><?php */?>
	<select class="form-control" name="order_dead_line" required>
		<option selected="selected" value="">Select deadline</option>
		<option value="1 Days">1 Days</option>
		<option value="2 Days">2 Days</option>
		<option value="3 Days">3 Days</option>
		<option value="4 Days">4 Days</option>
		<option value="5 Days">5 Days</option>
		<option value="6-10 Days">6-10 Days</option>
		<option value="10-20 Days">10-20 Days</option>
		<option value="20+ Days">20+ Days</option>

	</select>
  	</div>	
	</div>
		
	<div class="col-sm-12 float-left">
	<div class="form-group">
    <label>Description</label>
    <textarea class="form-control" rows="3" name="order_description"></textarea>
  	</div>
	</div>
	   
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Upload Question 1 <span class="manditory">*</span> <span>(jpeg,png,pdf,txt,doc maximum size: 2mb)</span></label>
    <input type="file" class="form-control" name="order_image" >
  	</div>
	</div>	
	   
	<div class="col-sm-6 float-left">
	<div class="form-group">
    <label>Upload Question 2 <span class="manditory">*</span> <span>(jpeg,png,pdf,txt,doc maximum size: 2mb)</span></label>
    <input type="file" class="form-control" name="order_image1" >
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
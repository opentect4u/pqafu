<div class="main-panel">
                    <div class="content-wrapper"> 
						
			<div class="card">
			<div class="card-body">
                <h3 class="text-primary">Order Detail </h3>
			<div class="row">

			<div class="col-4">
       
                <div class="form-group">
                    <label for="text1" class="control-label">PH number</label>

                    <div class="fieldSec">
                        <input type="text" id="cBalance" placeholder="Name of Category" class="form-control" name="amt" 
                                value="<?php if(isset($rates->phone)){ echo $rates->phone;} ?>" readonly
                        required>
                    </div>
                </div>
			</div>
            <div class="col-4">
       
                <div class="form-group">
                    <label for="text1" class="control-label">Time Zone</label>

                    <div class="fieldSec">
                        <input type="text" id="cBalance" placeholder="Name of Category" class="form-control" name="amt" 
                                value="<?php if(isset($rates->timezone)){ echo $rates->timezone;} ?>" readonly
                        required>
                    </div>
                </div>
            </div>
            <div class="col-4">
       
                <div class="form-group">
                    <label for="text1" class="control-label">Topic</label>

                    <div class="fieldSec">
                        <input type="text" id="cBalance" placeholder="Name of Category" class="form-control" name="amt" 
                                value="<?php if(isset($rates->topic)){ echo $rates->topic;} ?>" readonly
                        required>
                    </div>
                </div>
            </div>
            <div class="col-4">
       
                <div class="form-group">
                    <label for="text1" class="control-label">Grade</label>

                    <div class="fieldSec">
                        <input type="text" id="cBalance" placeholder="Name of Category" class="form-control" name="amt" 
                                value="<?php if(isset($rates->grade)){ echo $rates->grade;} ?>"  readonly
                        required>
                    </div>
                </div>
            </div>

             <div class="col-4">
       
                <div class="form-group">
                    <label for="text1" class="control-label">Assignment Type</label>

                    <div class="fieldSec">
                        <input type="text" id="cBalance" placeholder="Name of Category" class="form-control" name="amt" 
                                value="<?php if(isset($rates->assigntype)){ echo $rates->assigntype;} ?>" readonly
                        required>
                    </div>
                </div>
            </div>
             <div class="col-4">
       
                <div class="form-group">
                    <label for="text1" class="control-label">Word Count</label>

                    <div class="fieldSec">
                         <select class="form-control" name="max_words" required disabled>
    <option value="">Select Words Limit</option>
    <option value="1" <?php if($rates->max_words == '1'){ echo "selected" ; } ?> >500 Words</option>
    <option value="2" <?php if($rates->max_words == '2'){ echo "selected" ; } ?> >1000 Words</option>
    <option value="3" <?php if($rates->max_words == '3'){ echo "selected" ; } ?> >1500 Words Limit</option>
    <option value="4" <?php if($rates->max_words == '4'){ echo "selected" ; } ?> >2000 Words</option>
   </select>
                       
                    </div>
                </div>
            </div>

             <div class="col-4">
       
                <div class="form-group">
                    <label for="text1" class="control-label">Dead Line</label>

                    <div class="fieldSec">
                        <input type="text" id="cBalance" placeholder="Name of Category" class="form-control" name="amt" 
                                value="<?php if(isset($rates->order_dead_line)){ echo $rates->order_dead_line;} ?>" readonly
                        required>
                    </div>
                </div>
            </div>

                 <div class="col-12">
       
                <div class="form-group">
                    <label for="text1" class="control-label">Dead Line</label>

                    <div class="fieldSec">
                        <input type="text" id="cBalance" placeholder="Name of Category" class="form-control" name="amt" 
                                value="<?php if(isset($rates->order_description)){ echo $rates->order_description;} ?>" readonly
                        required>
                    </div>
                </div>
            </div>

               <div class="col-6">
       
                <div class="form-group">
                    <label for="text1" class="control-label">Document </label>

                    <div class="fieldSec">
                       <?php if(strlen($rates->order_image) > 12){?>
     <a href="<?=base_url()?>uploads/order/<?php if(isset($rates->order_image)){ echo $rates->order_image ;}?>" download>
        Download
    </a> 
    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-6">
       
                <div class="form-group">
                    <label for="text1" class="control-label">Document </label>

                    <div class="fieldSec">
                       <?php if(strlen($rates->order_image1) > 12){?>
     <a href="<?=base_url()?>uploads/order/<?php if(isset($rates->order_image1)){ echo $rates->order_image1 ;}?>" download>
        Download
    </a> 
    <?php } ?>
                    </div>
                </div>
            </div>




			</div>
			</div>
			</div>

			</div>
			<!-- /.outer -->
			</div>
			<!-- /#content -->
                
            </div>
<div id="content">

                    <div class="outer">

                        <div class="inner bg-light lter">
                          <div class="col-lg-6">
                            
                          <h3 class="text-primary">Update Question</h3>
                     
                          </div>
                          <div class="col-lg-6">  <span class="confirm-div" style="float:right; color:green;"><?php if(null != $this->session->flashdata('msg')) 
                  { echo $this->session->flashdata('msg');};?>
                      
                    <?php echo validation_errors(); ?> 

                  </span></div>

                            <div class="col-lg-12">
    <div class="box dark">
       
        <div id="div-1" class="body collapse in" aria-expanded="true" style="">
            <form class="form-horizontal" action="<?=base_url()?>index.php/admin/qa/editqu" method = "POST">
                    <input type="hidden" value="<?php echo $que->id; ?>" name='id'>
                
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Question</label>

                    <div class="col-lg-8" style="padding-top: 7px">
                      
                            <?php if(isset($que->question)){ echo $que->question;} ?>
                    </div>        
                       
                </div>

                     <div class="form-group">
                    

                    <label for="text1" class="control-label col-lg-2">Posted Date</label>

                     <div class="col-lg-2" style="padding-top: 7px">
                       
                           <?php if(isset($que->ask_dt)){ echo $que->ask_dt;} ?>
                     
                    </div>

                    
                    <label for="text1" class="control-label col-lg-2">User</label>

                    <div class="col-lg-2" style="padding-top: 7px">
                      
                            <?php if(isset($que->first_name)){ echo $que->first_name;} ?>
                       
                    </div>

                    <label for="text1" class="control-label col-lg-2">Category</label>

                    <div class="col-lg-2" style="padding-top: 7px">
                       
                            <?php if(isset($que->cat_name)){ echo $que->cat_name;} ?>                   
                     
                    </div>


                </div>

                <div class="form-group">
                   
                    <label for="text1" class="control-label col-lg-2">Grade</label>


                     <div class="col-lg-2" style="padding-top: 7px">
                      
                            <?php if(isset($que->grade_name)){ echo $que->grade_name;} ?>
                       
                    </div>

                </div>

                <div class="form-group">
                   
                    <label for="text1" class="control-label col-lg-2">Question Type</label>


                     <div class="col-lg-2" style="padding-top: 7px">
                      
                       <select name="qts_type" class="form-control chzn-select chzn-rtl ui-sortable-handle">

                           <option value="" >Select </option>
                           <option value="F" <?php if(isset($que->qts_type) && $que->qts_type == 'F'){echo "selected";}?>>Free</option>
                           <option value="P" <?php if(isset($que->qts_type) && $que->qts_type == 'P'){echo "selected";}?>>Paid </option>
                      
                       </select>
                       
                    </div>

                     <label for="text1" class="control-label col-lg-2">Question status</label>


                     <div class="col-lg-2" style="padding-top: 7px">
                      
                        <select name="qts_status" class="form-control chzn-select chzn-rtl ui-sortable-handle"  >
                          <option value="" >Select </option>
                           <option value="A" <?php if(isset($que->qts_status) && $que->qts_status == 'A'){echo "selected";}?>>Approved </option>
                           <option value="D" <?php if(isset($que->qts_status) && $que->qts_status == 'D'){echo "selected";}?>>Discarded</option>
                       </select>
                       
                    </div>

                </div>

                 <div class="form-group">
                   
                    <label for="text1" class="control-label col-lg-2">Remarks</label>


                     <div class="col-lg-10" style="padding-top: 7px">

                    <textarea class="form-control" name="remarks"><?php if(isset($que->remarks)){ echo $que->remarks;} ?></textarea>   
                       
                    </div>

                </div>
             
                    

                   <div class="form-actions no-margin-bottom">

                        <?php if($que->qts_status == 'P'){ ?>

                        <input type="submit" value="Submit" class="btn btn-primary">

                        <?php } ?>

                    </div>

                <!-- /.form-group -->

                <!-- /.row -->

                <!-- /.form-group -->
            </form>
        </div>
    </div>
</div>
                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->
                
            </div>
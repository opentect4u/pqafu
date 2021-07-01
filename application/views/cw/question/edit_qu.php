<div class="main-panel">
                    <div class="content-wrapper">
						
					<div class="card">
					<div class="card-body">
					<div class="row">
					<div class="col-12">
                         
                            
                          <h3 class="text-primary">Question</h3>
                     
                          
						<div class="row"> 
                          <div class="col-lg-12">  <span class="confirm-div" style="color:green;"><?php if(null != $this->session->flashdata('msg')) 
                  { echo $this->session->flashdata('msg');};?>
                      
                    <?php echo validation_errors(); ?> 

                  </span></div></div>


            <form class="form-horizontal" action="<?=base_url()?>admin/cw/editans" method = "POST"  enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $que->ans_id; ?>" name='id'>
                     <input type="hidden" value="<?php echo $que->id; ?>" name='qs_id'>
                
				<div class="row">
					
             

                <div class="col-sm-2">
                    <label for="text1" class="control-label">Posted Date</label>
                    <div class="fieldSec">
                    <?php if(isset($que->ask_dt)){ echo date('d/m/Y',strtotime($que->ask_dt));} ?>
                    </div>
                 </div>
				
      				  <div class="col-sm-3">
                          <label for="text1" class="control-label">User</label>

                          <div class="fieldSec">
                          <?php if(isset($que->first_name)){ echo $que->first_name;} ?>
                          </div>
      			    </div>
				
        				<div class="col-sm-2">
                            <label for="text1" class="control-label">Category</label>

                            <div class="fieldSec">
                                    <?php if(isset($que->cat_name)){ echo $que->cat_name;} ?>                   
                             
                            </div>
               </div>

                

                <div class="col-sm-2">
                    <label for="text1" class="control-label">Grade</label>
                     <div class="fieldSec">
                            <?php if(isset($que->grade_name)){ echo $que->grade_name;} ?>
                    </div>
				        </div>
				
				
      				   <div class="col-sm-3">
                       <label for="text1" class="control-label">Question Type</label>
      				        <div class="fieldSec">
                            <?php if(isset($que->qts_type) && $que->qts_type == 'F'){echo "FREE"; }else{ echo "PAID";}?>
                             
                          </div>

                </div>
                 <div class="col-sm-12">
                    <label for="text1" class="control-label">Title</label>
                    <div class="fieldSec">
                    <?php if(isset($que->title)){ echo $que->title;} ?>
                    </div>        
                </div>

                <div class="col-sm-12">
                    <label for="text1" class="control-label">Question</label>
                    <div class="fieldSec">
                    <?php if(isset($que->question)){ echo $que->question;} ?>
                    </div>        
                </div>

                 <div class="col-sm-12">
                   
                    <label for="text1" class="control-label" style="margin-bottom: 5px;">Answer</label>

                    <div class="fieldSec">
                    <textarea name="answer" class="form-control" rows="20" id="editor" ><?php if(isset($que->answer)){ echo $que->answer;} ?></textarea>
                     </div>
                    

                </div>

                       
                    

                   <div class="col-sm-12" style="margin-top: 12px;">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
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
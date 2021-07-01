<div class="main-panel">
                    <div class="content-wrapper">

          <div class="card">
					<div class="card-body">
					<div class="row">
						
						
                          <div class="col-lg-4">
                          <h3 class="text-primary">Update User </h3>
                          </div>
                          <div class="col-lg-4"> <br><b style="color: red;"><?php echo validation_errors(); ?> </b></div>
                          <div class="col-lg-4">
                           
                          <h4 class="text-primary"><a href="<?=base_url()?>admin/qa/anslist_user/<?php if(isset($cws->user_id)){ echo $cws->user_id;} ?>">Answer List</a></h4>
                                                                      
                          </div>
       
            <form class="form-horizontal" action="<?=base_url()?>index.php/admin/add_new/editcw" method = "POST">
                    <input type="hidden" value="<?php echo $cws->user_id; ?>" name='user_id'>
                <div class="col-lg-4">
					
                <div class="form-group">
                    <label for="text1" class="control-label">Name</label>
                    <div class="fieldSec"><?php if(isset($cws->first_name)){ echo $cws->first_name.'&nbsp;'.$cws->last_name;} ?></div>
                </div>

                 <div class="form-group">
                    <label for="text1" class="control-label">Email</label>
                    <div class="fieldSec"><?php if(isset($cws->email)){ echo $cws->email;} ?></div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label">Status</label>

                    <div class="fieldSec">
                       <select name="user_status" class="form-control" required>
                           <option value="">Select</option>
                           <option value="A" <?php if($cws->user_status == 'A'){ echo "selected"; } ?> >Active</option>
                           <option value="I" <?php if($cws->user_status == 'I'){ echo "selected"; } ?>>Inactive</option>
                       </select>
                    </div>
                </div>

             </div>
             <div class="col-lg-4">
                 <div class="form-group">
                    <label for="text1" class="control-label">Contact no</label>

                    <div class="fieldSec"><?php if(isset($cws->contact_no)){ echo $cws->contact_no;} ?></div>
                </div>

             <!--     <div class="form-group">
                    <label for="text1" class="control-label">Last Login</label>

                    <div class="fieldSec"><?php //echo get_user_lastlogin($cws->user_id) ; ?></div>
                </div> -->

             </div>
             <div class="col-lg-4">
                 <!--  <img src="<?=base_url()?>assets/img/Pqafu.png" alt="Italian Trulli" height="80px" width="120px"> -->
             
             </div>
            <div class="col-lg-12">
                
			<div class="form-group">
			<label for="text1" class="control-label">Remarks</label>
			<div class="fieldSec"><textarea id="text4" class="form-control" name="remarks"> <?php if(isset($cws->remarks)){ echo $cws->remarks;} ?></textarea></div>
			</div>
				
             </div>
				
            <div class="col-lg-12">
                   <div class="form-actions no-margin-bottom">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>

            </div>

             
            </form>
       
                        
											</div>
					</div>
					</div>
						

                        
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->
                
            </div>
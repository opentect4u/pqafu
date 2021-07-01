<div class="main-panel">
                    <div class="content-wrapper">
						
					<div class="card">
					<div class="card-body">
					<div class="row">
					<div class="col-4">
                          
                            
                          <h3 class="text-primary">Select Question Status</h3>
                     
					<div class="col-lg-6">  <span class="confirm-div" style="float:right; color:green;"><?php if(null != $this->session->flashdata('msg')) 
                  { echo $this->session->flashdata('msg');};?>
                      
                    <?php echo validation_errors(); ?> 

                  </span></div>

                            
            <form class="form-horizontal" action="<?=base_url()?>index.php/admin/cw" method = "POST">

                <div class="form-group">
                    <label for="text1" class="control-label" style="clear: both; margin-bottom: 5px; float: left;">Status</label>

                    <div class="fieldSec">
                       <select name="qu_status" class="form-control chzn-select chzn-rtl">
                           <option value="P">New</option>
                           <option value="A">Answered </option>
                      <!--      <option value="S">Solved</option> -->
                       </select>
                    </div>
                </div>
             

                   <div class="form-actions no-margin-bottom">
                        <input type="submit" value="Submit" class="btn btn-primary">
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
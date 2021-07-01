<div class="main-panel">
                    <div class="content-wrapper"> 
						
					<div class="card">
					<div class="card-body">
					<div class="row">
					<div class="col-4">
                            
                          <h3 class="text-primary">Add Grade </h3>



            <form class="form-horizontal" action="<?=base_url()?>index.php/admin/add_new/editgrade" method = "POST">
                    <input type="hidden" value="<?php echo $grade->id; ?>" name='id'>
                <div class="form-group">
                    <label for="text1" class="control-label">Name</label>

                    <div class="fieldSec">
                        <input type="text" id="text1" placeholder="Name of Category" class="form-control" name="grade_name" 
                                value="<?php if(isset($grade->grade_name)){ echo $grade->grade_name;} ?>"
                        required>
                    </div>
                </div>
             

                   <div class="form-actions no-margin-bottom">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>

                <!-- /.form-group -->

                <!-- /.row -->

                <!-- /.form-group -->
            </form>

                        <!-- /.inner -->
					</div>
					</div>
					</div>
					</div>
						
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->                
            </div>
<div class="main-panel">
                    <div class="content-wrapper"> 
						
			<div class="card">
			<div class="card-body">
			<div class="row">
			<div class="col-4">

			<h3 class="text-primary">Update Subscription </h3>

                    
            <form class="form-horizontal" action="<?=base_url()?>index.php/admin/add_new/editorderRate" method = "POST">
                    <input type="hidden" value="<?php echo $rates->id; ?>" name='id'>
                

                <div class="form-group">
                    <label for="text1" class="control-label">Amount</label>

                    <div class="fieldSec">
                        <input type="text" id="cBalance" placeholder="Name of Category" class="form-control" name="amt" 
                                value="<?php if(isset($rates->amt)){ echo $rates->amt;} ?>" 
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
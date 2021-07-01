<div class="main-panel">
                    <div class="content-wrapper"> 
						
					<div class="card">
					<div class="card-body">
					<div class="row">
					<div class="col-12">
                          
                            
                          <h3 class="text-primary">Update Subscription </h3>


            <form class="form-horizontal" action="<?=base_url()?>index.php/admin/add_new/editsubsc" method = "POST">
                    <input type="hidden" value="<?php echo $rates->id; ?>" name='id'>
                
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Name</label>

                    <div class="col-lg-8">
                        <label for="text1" class="control-label">
                            <?php if(isset($rates->subscription_type)){ echo $rates->subscription_type;} ?></label>
                       
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Amount</label>

                    <div class="col-lg-3">
                        <input type="text" id="cBalance" placeholder="Name of Category" class="form-control" name="amount" 
                                value="<?php if(isset($rates->amount)){ echo $rates->amount;} ?>" 
                        required>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Discount(%)</label>

                    <div class="col-lg-3">
                        <input type="text" id="chDiscount" placeholder="Name of Category" class="form-control" name="discount" 
                                value="<?php if(isset($rates->discount)){ echo $rates->discount;} ?>" 
                        required>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Discount Amount</label>

                    <div class="col-lg-3">
                        <input type="text" id="result" placeholder="Name of Category" class="form-control" name="dis_amt" 
                                value="<?php if(isset($rates->dis_amt)){ echo $rates->dis_amt;} ?>" 
                        readonly> 
                    </div>
                </div>
             

				<div class="control-label col-lg-3">&nbsp;</div> 
				<div class="col-lg-3">
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


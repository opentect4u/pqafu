<div class="main-panel">
                    <div class="content-wrapper">

			<div class="card">
			<div class="card-body">
			<div class="row">
			<div class="col-4">              
                            
            <h3 class="text-primary">Select Answer Status</h3>


            <form class="form-horizontal" action="<?=base_url()?>index.php/admin/qa/anslist" method = "POST">

                <div class="form-group">
                    <label for="text1" class="control-label">Status</label>

                    <div>
                       <select name="ans_status" class="form-control chzn-select chzn-rtl">
                           <option value="F">New</option>
                           <option value="A">Approved </option>
                           <option value="D">Discarded</option>
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
                    <!-- /.outer -->
                </div>
                <!-- /#content -->
                
            </div>
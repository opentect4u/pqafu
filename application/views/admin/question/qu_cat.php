<div class="main-panel">

                    <div class="content-wrapper">

						<div class="card">
						<div class="card-body">
						<div class="row">
						<div class="col-4">                          
                            
                          <h3 class="text-primary">Select Question Status</h3>

                         

                            
            <form class="form-horizontal" action="<?=base_url()?>index.php/admin/qa/filter_question_list" method = "POST">

                <div class="form-group">
                    <label for="text1" class="control-label">Status</label>

                    <div>
                       <select name="qu_status" class="form-control chzn-select chzn-rtl">
                           <option value="P">New</option>
                           <option value="A">Approved </option>
                           <option value="D">Discarded</option>
                         <!--   <option value="S">Solved</option> -->
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
							
        
                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                
            </div>
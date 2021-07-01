<div class="main-panel">
                    <div class="content-wrapper">
						
					<div class="card">
					<div class="card-body">
					<div class="row">
					<div class="col-12">
                         
                            
                          <h3 class="text-primary">Select Answer Status</h3>


            <form class="form-horizontal" action="<?=base_url()?>index.php/admin/qa/editans_status" method = "POST">

                <input type="hidden" name="ans_id" value =" <?php if(isset($ans->id)){echo $ans->id;}?>">
				<div class="rowCustom">
                <div class="form-group">
					
					      <!-- <div class="col-lg-3">
                      <label for="text1" class="control-label">Question Id: </label>
                      <div class="fieldSec">
                       <?php //if(isset($que->id)){echo $que->id;}?>
                      </div>

                  </div> -->
                   
                   <div class="col-lg-3">
                    <label for="text1" class="control-label">Question Date: </label>
                    <div class="fieldSec">
                    <?php if(isset($que->created_dt))
                    {echo date('d/m/Y',strtotime($que->created_dt));}?>
                    </div></div>
                   
					    <div class="col-lg-3">
                    <label for="text1" class="control-label">Question user: </label>
                    <div class="fieldSec">
                   <?php if(isset($que->first_name)){echo $que->first_name;}?>
                    </div></div>
				
					
					    <div class="col-lg-3">
					    <label for="text1" class="control-label">Category: </label>
                    <div class="fieldSec">
                      <?php if(isset($que->cat_name)){echo $que->cat_name;}?>
                    </div></div>

                    <div class="col-lg-3">
					    <label for="text1" class="control-label">Grade: </label>
                    <div class="fieldSec">
                      <?php if(isset($que->grade_name)){echo $que->grade_name;}?>
                    </div></div>

                      <div class="col-lg-9">
                    <label for="text1" class="control-label">Title: </label>
                    <div class="fieldSec">
                      <?php if(isset($que->title)){echo $que->title;}?>
                    </div></div>
						
						
					        <div class="col-lg-3">	
                    <label for="text1" class="control-label">Question type: </label>
                    <div class="fieldSec">
                      <?php if(isset($que->qts_type)){echo $que->qts_type;}?>
                    </div></div>

                 <div class="col-lg-12">
                    <label for="text1" class="control-label">Question: </label>
                    <div class="fieldSec">
                      <?php if(isset($que->question)){echo $que->question;}?>
                    </div></div>
                   
                </div>
				</div>				
				


                   <div class="col-lg-12" style="text-align: left;">
                            
                          <h3 class="text-primary" style="text-align: center; font-size: 18px; background: #e8e8e8; padding: 9px;">Answer Part</h3>

                  </div>
				
				
				<div class="rowCustom">
                <div class="form-group">
					
					
					<div class="col-lg-12">
					<label for="text1" class="control-label">Answer: </label>
                    <div class="fieldSec">
                    <?php if(isset($ans->answer)){echo $ans->answer;}?>
                    </div></div>
					
					<div class="col-lg-3">
					<label for="text1" class="control-label">Writer: </label>
                    <div class="fieldSec">
                    <?php if(isset($ans->first_name)){echo $ans->first_name;}?>
                    </div></div>
					
					<div class="col-lg-3">
					<label for="text1" class="control-label">Created Dt: </label>
                    <div class="fieldSec">
                    <?php if(isset($ans->created_dt)){echo date('d/m/Y',strtotime($ans->created_dt));}?>
                    </div></div>
					
				<!-- 	<div class="col-lg-3">
					<label for="text1" class="control-label">Like: </label>
                    <div class="fieldSec">
                   <?php //if(isset($ans->like_no)){echo $ans->like_no;}?>
                    </div></div>
 -->
					
				</div>
				</div>
				
				<div class="rowCustom">
                <div class="form-group">

					
			<!-- 		<div class="col-lg-3">
					<label for="text1" class="control-label">Dislike: </label>
                    <div class="fieldSec">
                   <?php //if(isset($ans->dislike_no)){echo $ans->dislike_no;}?>
                    </div></div> -->
					
					<div class="col-lg-3">
					<label for="text1" class="control-label">Status</label>
                    <div class="fieldSec">
                       <select name="ans_status" class="form-control chzn-select chzn-rtl ui-sortable-handle" <?php if($ans->ans_status == 'F'){ echo "";}else{ echo "disabled"; }?> >
                           <option value="F" <?php if(isset($ans->ans_status) && $ans->ans_status == 'F'){echo "selected";}?>>New</option>
                           <option value="A" <?php if(isset($ans->ans_status) && $ans->ans_status == 'A'){echo "selected";}?>>Approved </option>
                           <option value="D" <?php if(isset($ans->ans_status) && $ans->ans_status == 'D'){echo "selected";}?>>Discarded</option>
                       </select>
                    </div></div>

				</div>
				</div>

                                      
                      <div class="form-actions no-margin-bottom">

                        <?php if($ans->ans_status == 'F' ) { ?>

                        <input type="submit" value="Submit" class="btn btn-primary">
                     <?php } ?>
                    </div>
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
<div id="content">

                    <div class="outer">

                        <div class="inner bg-light lter">
                          <div class="col-lg-12">
                            
                          <h3 class="text-primary">Select Answer Status</h3>
</span>
                          </div>

                            <div class="col-lg-12">
    <div class="box dark">
       
        <div id="div-1" class="body collapse in" aria-expanded="true" style="">
            <form class="form-horizontal" action="<?=base_url()?>index.php/admin/qa/editans_status" method = "POST">

                <input type="hidden" name="ans_id" value =" <?php if(isset($ans->id)){echo $ans->id;}?>">

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Question Id</label>
                    <div class="col-lg-2" style="padding-top: 7px;">
                     <?php if(isset($que->id)){echo $que->id;}?>
                    </div>
                   
                   
                    <label for="text1" class="control-label col-lg-2">Question Date</label>
                     <div class="col-lg-2" style="padding-top: 7px;">
                    <?php if(isset($que->created_dt))
                    {echo date('d/m/Y',strtotime($que->created_dt));}?>
                    </div>
                   

                    <label for="text1" class="control-label col-lg-2">Question user</label>

                     <div class="col-lg-2" style="padding-top: 7px;">
                   <?php if(isset($que->first_name)){echo $que->first_name;}?>
                    </div>
                   
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Question</label>

                    <div class="col-md-10" style="padding-top: 7px;">
                      <?php if(isset($que->question)){echo $que->question;}?>
                    </div>
                                     
                </div>

                <div class="form-group">
                    
                    <label for="text1" class="control-label col-lg-2">Category</label>

                    <div class="col-lg-2" style="padding-top: 7px;">
                      <?php if(isset($que->cat_name)){echo $que->cat_name;}?>
                    </div>

                     <label for="text1" class="control-label col-lg-2">Grade</label>

                    <div class="col-lg-2" style="padding-top: 7px;">
                      <?php if(isset($que->grade_name)){echo $que->grade_name;}?>
                    </div>
                    <label for="text1" class="control-label col-lg-2">Question type</label>

                    <div class="col-lg-2" style="padding-top: 7px;">
                      <?php if(isset($que->qts_type)){echo $que->qts_type;}?>
                    </div>
                   
                  </div>

                   <div class="col-lg-12" style="text-align: center;">
                            
                          <b class="text-primary" >Answer Part</b>

                  </div>

                  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Answer</label>

                    <div class="col-lg-10" style="padding-top: 7px;">
                    <?php if(isset($ans->answer)){echo $ans->answer;}?>
                    </div>
                   
                  </div>

                  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Writer</label>

                    <div class="col-lg-4"  style="padding-top: 7px;">
                        <?php if(isset($ans->first_name)){echo $ans->first_name;}?>
                    </div>
                     <label for="text1" class="control-label col-lg-2">Created Dt</label>

                    <div class="col-lg-4"  style="padding-top: 7px;">
                    <?php if(isset($ans->created_dt)){echo date('d/m/Y',strtotime($ans->created_dt));}?>
                    </div>
                   
                  </div>
                   <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Like</label>

                    <div class="col-lg-4"  style="padding-top: 7px;">
                   <?php if(isset($ans->like_no)){echo $ans->like_no;}?>
                    </div>
                    <label for="text1" class="control-label col-lg-2">Dislike</label>

                    <div class="col-lg-4"  style="padding-top: 7px;">
                   <?php if(isset($ans->dislike_no)){echo $ans->dislike_no;}?>
                    </div>

                  </div>

                    <div class="form-group">
                    <label for="text1" class="control-label col-lg-4 ">Status</label>

                    <div class="col-lg-3 ui-sortable">
                       <select name="ans_status" class="form-control chzn-select chzn-rtl ui-sortable-handle" <?php if($ans->ans_status == 'F'){ echo "";}else{ echo "disabled"; }?> >
                           <option value="F" <?php if(isset($ans->ans_status) && $ans->ans_status == 'F'){echo "selected";}?>>New</option>
                           <option value="A" <?php if(isset($ans->ans_status) && $ans->ans_status == 'A'){echo "selected";}?>>Approved </option>
                           <option value="D" <?php if(isset($ans->ans_status) && $ans->ans_status == 'D'){echo "selected";}?>>Discarded</option>
                       </select>
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
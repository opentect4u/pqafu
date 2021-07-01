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
            <form class="form-horizontal" action="<?=base_url()?>index.php/admin/qa/anslist" method = "POST">

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Status</label>

                    <div class="col-lg-3">
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
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->
                
            </div>
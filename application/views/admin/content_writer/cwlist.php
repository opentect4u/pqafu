<div class="main-panel">
                    <div class="content-wrapper"> 
                        <div class="inner bg-light lter">
                            <!--Begin Datatables-->
<div class="row">
  <div class="col-lg-12">
        <div class="box">
            <header>
                
               <div class="no-margin-bottom">
            <a href="<?=base_url()?>index.php/admin/add_new/addcw" class="btn btn-primary" data-original-title="" title="">Add</a>    
                <span class="confirm-div" style="float:right; color:green;"><?php if(null != $this->session->flashdata('msg')) 
                  { echo $this->session->flashdata('msg');};?></span>
               </div>
                   
            </header>
            <div id="collapse4" class="body">
				<div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                    <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Name</th>
                      <!--   <th>Email</th> -->
                      <!--   <th>Status</th> -->
                       <!--  <th>Created By</th> -->
                        <th>Created Date</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php if($cws){     
                            $i = 0; 
                                  
                                  foreach($cws as $cw){

                            ?>
                            <tr>
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $cw->first_name; ?></td>
                             <!--    <td><?php //echo $cw->email; ?></td> -->
                             <!--    <td><?php //echo $cw->user_status; ?></td> -->
                              <!--   <td><?php //echo $cw->created_by; ?></td> -->
                                <td><?php echo $cw->created_dt; ?></td>
                                <td><a href="<?=base_url()?>index.php/admin/add_new/editcw?id=<?=$cw->user_id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
                                   
                                </td>
                            </tr>
                           
                         <?php }  } ?>
                                                  
                          
                    </tbody>   
                </table>
            </div>
			</div>	
</div>
    </div>
</div>
<!-- /.row -->
<!--End Datatables-->


                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->

                    <?php /*?><div id="right" class="onoffcanvas is-right is-fixed bg-light" aria-expanded=false>
                        <a class="onoffcanvas-toggler" href="#right" data-toggle=onoffcanvas aria-expanded=false></a>
                        <br>
                        <br>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Warning!</strong> Best check yo self, you're not looking too good.
                        </div>
                        <!-- .well well-small -->
                        <div class="well well-small dark">
                            <ul class="list-unstyled">
                                <li>Visitor <span class="inlinesparkline pull-right">1,4,4,7,5,9,10</span></li>
                                <li>Online Visitor <span class="dynamicsparkline pull-right">Loading..</span></li>
                                <li>Popularity <span class="dynamicbar pull-right">Loading..</span></li>
                                <li>New Users <span class="inlinebar pull-right">1,3,4,5,3,5</span></li>
                            </ul>
                        </div>
                   
                    </div><?php */?>
                    <!-- /#right -->
            </div>
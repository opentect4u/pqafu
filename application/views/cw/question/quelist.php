<div class="main-panel">
                    <div class="content-wrapper"> 
                        <div class="inner bg-light lter">
                            <!--Begin Datatables-->
                             <?php /*?><div class="row">
                                 <div class="col-md-12" style="text-align: center;font-size: 18px"><b >Status:</b> <?php echo $status;?></div>
                            </div><?php */?>
							<h3 class="text-primary" style="margin-top: 15px;"><b >Status:</b> <?php echo $status;?></h3>
							
<div class="row">
  <div class="col-lg-12">
        <div class="box">
            <header>
                
               <div class="no-margin-bottom">
               
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
                        <th>forward date</th>
                        <th>Title </th>                      
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php if($question){     
                            $i = 0; 
                                  
                                  foreach($question as $qu){

                            ?>
                            <tr>
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo date('d/m/Y h:m:i',strtotime($qu->approved_dt)); ?></td>
                                <td><?php echo $qu->title; ?>
                                    <?php //echo $status;?>

                                </td>

                                <?php if($status == 'New') { ?>
                                <td><a href="<?=base_url()?>index.php/admin/cw/post_ans?id=<?=$qu->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Post Answer</a></td>
                                <?php }else{ ?>

                                    <td><a href="<?=base_url()?>admin/cw/editqu?id=<?=$qu->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
                                    <a href="<?=base_url()?>admin/cw/delans?id=<?=$qu->ans_id;?>" style="color:red"><i class="glyphicon glyphicon-trash"></i></a></td>

                                <?php } ?>
                            </tr>
                           
                         <?php }  
                                   } ?>
                                                  
                          
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
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 90px;
  height: 34px;
}

.switchs {
  position: relative;
  display: inline-block;
  width: 90px;
  height: 34px;
}

.switch input {display:none;}

.switchs input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ca2222;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2ab934;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(55px);
  -ms-transform: translateX(55px);
  transform: translateX(55px);
}

/*------ ADDED CSS ---------*/
.on
{
  display: none;
}

.off{
  color: white;
  position: absolute;
  transform: translate(-50%,-50%);
  top: 50%;
  left: 60%;
  font-size: 8px;
  font-family: Verdana, sans-serif;
}

.on{
  color: white;
  position: absolute;
  transform: translate(-50%,-50%);
  top: 50%;
  left: 40%;
  font-size: 8px;
  font-family: Verdana, sans-serif;
}

input:checked+ .slider .on
{display: block;}

input:checked + .slider .off
{display: none;}

/*--------- END --------*/

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;}
    
</style>

<div class="main-panel">
                    <div class="content-wrapper"> 
                        <div class="inner bg-light lter">
                            <!--Begin Datatables-->
                             <div class="row">
                                 <!-- <div class="col-md-12" style="text-align: center;font-size: 18px"><b >Status:</b> <?php //echo $status;?></div> -->
                            </div>
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
                        <th>Date </th>
                        <th>Title </th>
                        <th>Question </th>
                      <!--   <th>Change Status</th>
                        <th>Payment</th> -->
                        <th>Created By</th>
                        <th>Category</th>
                        <th>Grade</th>
                        
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
                                <td><?php echo date('d/m/Y h:m:i',strtotime($qu->created_dt)); ?></td>
                                <td><?php echo $qu->title; ?></td>
                                <td class="wrapperCustom"><div style="width: 350px;">


      <?php if(isset($qu->question)){ if(strlen($qu->question) > 50 ) {echo substr($qu->question,0,50).'<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_'.$qu->id.'">Read Question</button>';}else{
          echo $qu->question;
        }

      }?>
                           
                                </div></td>
                            <!--     
                                 <td>

                                  <input type="hidden" name="q_id" class="q_id" value="<?=$qu->id;?>" >
                                   <label class="switch">
                                     <input type="checkbox" id="togBtn" id="<?=$qu->id;?>" class="status" name="status" <?php// if($qu->qts_status == 'A'){  echo "checked";} ?> value="<?=$qu->qts_status;?>">

                                     <div class="slider round">
                                    
                                      <span class="on">Approved</span>
                                      <span class="off">Progress</span></div></label>

                               </td> -->
                              <!--   <td>

                                    <input type="hidden" name="q_id" class="q_id" value="<?=$qu->id;?>" >
                                   <label class="switchs">
                                     <input type="checkbox" id="togBtns" id="<?=$qu->id;?>" class="subs" name="subs" <?php //if($qu->qts_type == 'P'){  echo "checked";} ?> value="<?=$qu->qts_type;?>">

                                     <div class="slider round">
                                     
                                      <span class="on">PAID</span>
                                      <span class="off">FREE</span></div></label>
                              

                                </td> -->
                               
                                <td><?php echo $qu->first_name; ?></td>
                                <td><?php echo $qu->cat_name; ?></td>
                                <td><?php echo $qu->grade_name; ?></td>
                               
                                <td>
                                  <a href="<?=base_url()?>/admin/qa/del_qu?id=<?=$qu->id;?>"><i class="glyphicon glyphicon-trash"></i></a>


                                </td>
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

                    <div id="right" class="onoffcanvas is-right is-fixed bg-light" aria-expanded=false>
                        <a class="onoffcanvas-toggler" href="#right" data-toggle=onoffcanvas aria-expanded=false></a>
                        <br>
                        <br>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Warning!</strong> Best check yo self, you're not looking too good.
                        </div>
                        <!-- .well well-small -->
                   <!--      <div class="well well-small dark">
                            <ul class="list-unstyled">
                                <li>Visitor <span class="inlinesparkline pull-right">1,4,4,7,5,9,10</span></li>
                                <li>Online Visitor <span class="dynamicsparkline pull-right">Loading..</span></li>
                                <li>Popularity <span class="dynamicbar pull-right">Loading..</span></li>
                                <li>New Users <span class="inlinebar pull-right">1,3,4,5,3,5</span></li>
                            </ul>
                        </div> -->
                   
                    </div>
                    <!-- /#right -->
            </div>
<script>
$(document).on('click','.status_change',function(){ 

    var status = ($(this).hasClass("btn-success")) ? 'A' : 'D'; 
    var msg = (status == 'A')? 'Activate' : 'Discard'; 
    if(confirm("Are you sure to "+ msg))
    { 
        var current_element = $(this); 
        var id = $(current_element).attr('data-id');
        url = "<?php echo base_url().'index.php/admin/qa/change_status'?>"; 
            $.ajax({
              type:"POST",
              url: url, 
              data: {"id":id,"status":status}, 
              success: function(data) { 
              location.reload();
        } });
     }  
 });




</script>

<!-- For Toggle Switch --> 

<script>

    $('.table tbody').on('click', '#togBtn', function(){
        var row = $(this).closest('tr');
    
        var id = row.find('td:eq(4) .q_id').val();

        var status = row.find('td:eq(4) .status').val();
       console.log(status);
        if(status == 'A'){

             statuss = 'P';
        }else{
           statuss = 'A';
        }

          console.log(id,status);

          
            url = "<?php echo base_url().'index.php/admin/qa/change_status'?>"; 
                $.ajax({
                  type:"POST",
                  url: url, 
                  data: {"id":id,"status":statuss}, 
                  success: function(data) { 
                  //location.reload();
                 } });        

    })
 
</script>

<script>

    $('.table tbody').on('click', '#togBtns', function(){
        var row = $(this).closest('tr');
    
        var id = row.find('td:eq(5) .q_id').val();
        var status = row.find('td:eq(5) .subs').val();

        if(status == 'F'){

             statuss = 'P';
        }else{

           statuss = 'F';
        }

            url = "<?php echo base_url().'index.php/admin/qa/change_subscription'?>"; 
                $.ajax({
                  type:"POST",
                  url: url, 
                  data: {"id":id,"status":statuss}, 
                  success: function(data) { 
                  //location.reload();
                 } });        

    })
 
</script>

<script>

    $('.table tbody').on('click', '.toggle', function(){
        var row = $(this).closest('tr');
        var id = row.find('td:eq(5)  input').val();
        var status = ($(this).hasClass("btn-success")) ? 'F' : 'P'; 
          
            url = "<?php echo base_url().'index.php/admin/qa/change_subscription'?>"; 
                $.ajax({
                  type:"POST",
                  url: url, 
                  data: {"id":id,"status":status}, 
                  success: function(data) { 
                  //location.reload();
            } });        

    })
 
</script>

<!-- Modal -->
<?php         if($question){     
                                  
                    foreach($question as $qu){

                            ?>
<div class="modal fade" id="exampleModal_<?php echo $qu->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal_dialog_custom" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <?php echo $qu->title; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <?php echo $qu->question; ?>
            <div class="btn_custom_group">
                         <div class="changestatus_custom">
                                <label class="switch">
                                   <input type="checkbox" id="togBtn" id="<?=$qu->id;?>" class="tot status" name="status" <?php if($qu->qts_status == 'A'){  echo "checked";} ?> value="<?=$qu->qts_status;?>,<?=$qu->id;?>">

                                   <div class="slider round">
                                    <!--ADDED HTML -->
                                    <span class="on">Approved</span>
                                    <span class="off">Progress</span><!--END--></div>
                                </label>
                        </div>  

                        <div class="payment_custom">           

                              <label class="switchs">
                                    <input type="checkbox" id="togBtns" id="<?=$qu->id;?>" class="sts subs" name="subs" <?php if($qu->qts_type == 'P'){  echo "checked";} ?> value="<?=$qu->qts_type;?>,<?=$qu->id;?>">

                                    <div class="slider round">
                                      <!--ADDED HTML -->
                                    <span class="on">PAID</span>
                                    <span class="off">FREE</span><!--END--></div>
                              </label>

                        </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="location.reload();" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<?php } }?>


<script>

  $( document ).ready(function() {

    $('.modal-body').on('click', '.tot', function(){
      
        var val      = $(this).val();
        var row      = val.split(",");
        var status   = row[0];
        var id       = row[1];


        if(status == 'A'){

             statuss = 'P';
        }else{
           statuss = 'A';
        }
          
            url = "<?php echo base_url().'index.php/admin/qa/change_status'?>"; 
                $.ajax({
                  type:"POST",
                  url: url, 
                  data: {"id":id,"status":statuss}, 
                  success: function(data) { 
                  //location.reload();
                 } });        

    })
  })

  $( document ).ready(function() {

    $('.modal-body').on('click', '.sts', function(){
      
        var val      = $(this).val();
        var row      = val.split(",");
        var status   = row[0];
        var id       = row[1];


        if(status == 'F'){

             statuss = 'P';
        }else{

           statuss = 'F';
        }

                 url = "<?php echo base_url().'index.php/admin/qa/change_subscription'?>"; 
                $.ajax({
                  type:"POST",
                  url: url, 
                  data: {"id":id,"status":statuss}, 
                  success: function(data) { 
                  //location.reload();
                 } });        

    })
  })

  $( document ).ready(function() {

    $('.table tbody').on('click', '#togBtn', function(){
        var row = $(this).closest('tr');
    
        var id = row.find('td:eq(4) .q_id').val();

        var status = row.find('td:eq(4) .status').val();
       console.log(status);
        if(status == 'A'){

             statuss = 'P';
        }else{
           statuss = 'A';
        }
          
            url = "<?php echo base_url().'index.php/admin/qa/change_status'?>"; 
                $.ajax({
                  type:"POST",
                  url: url, 
                  data: {"id":id,"status":statuss}, 
                  success: function(data) { 
                  //location.reload();
                 } });        

    })
  })
 
</script>

<script>

    $('.table tbody').on('click', '#togBtns', function(){
        var row = $(this).closest('tr');
    
        var id = row.find('td:eq(5) .q_id').val();
        var status = row.find('td:eq(5) .subs').val();

        if(status == 'F'){

             statuss = 'P';
        }else{

           statuss = 'F';
        }

            url = "<?php echo base_url().'index.php/admin/qa/change_subscription'?>"; 
                $.ajax({
                  type:"POST",
                  url: url, 
                  data: {"id":id,"status":statuss}, 
                  success: function(data) { 
                  //location.reload();
                 } });        

    })
 
</script>

<script>

    $('.table tbody').on('click', '.toggle', function(){
        var row = $(this).closest('tr');
        var id = row.find('td:eq(5)  input').val();
        var status = ($(this).hasClass("btn-success")) ? 'F' : 'P'; 
          
            url = "<?php echo base_url().'index.php/admin/qa/change_subscription'?>"; 
                $.ajax({
                  type:"POST",
                  url: url, 
                  data: {"id":id,"status":status}, 
                  success: function(data) { 
                  //location.reload();
            } });        

    })
 
</script>
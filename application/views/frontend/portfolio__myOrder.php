<div class="breadcrumb">
	<ul>
<li><a href="<?=base_url()?>user">Home</a></li>  <li>&gt;</li>  
<li>My Order</li>
</ul>
	</div>

<div class="bodyContainer">
<div class="wrapper">
	<?php $this->load->view('frontend/common/sidebar');?>


<div class="col-sm-9 float-left">
	<div class="rightsideSection shadoSection">
	<h1>My Order</h1><a href="<?=base_url()?>user/order"><button type="button" name="button" class="newOrderBtn"><i class="fa fa-plus" aria-hidden="true"></i>  Make New Order</button></a>
		
	<table class="table table-striped">
  <thead class="thead-dark tableSeeGreenHead">
    <tr>
      <th scope="col">Sl No</th>
      <th scope="col">Order Date</th>
      <th scope="col">Order Deadline</th>
      <th scope="col">View Order</th>
    </tr>
  </thead>
  <tbody>

    <?php 

    if($orders){
            $i = 0;
    foreach($orders as $or){ ?>
    <tr>
      <th scope="row"><?php  echo ++$i;?></th>
      <td><?php if(isset($or->order_date)){ echo date('d/m/Y',strtotime($or->order_date)) ;}?></td>
      <td><?php if(isset($or->order_dead_line)){ echo date('d/m/Y',strtotime($or->order_dead_line));}?></td>
      <td><a href="<?=base_url()?>user/vieworder/<?php if(isset($or->id)){ echo $or->id;}?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
    </tr>
  <?php } } else{ ?>


    <tr>
     
      <td colspan="4">Upload your First Assignment to get upto 40% off</td>
   
    </tr>
  
	 <?php }  ?>
  
   
  </tbody>
</table>
		
		
	</div>
</div>
	
	<br clear="all">

</div>
</div>
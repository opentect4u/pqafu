<div class="breadcrumb">
	<ul>
<li><a href="<?=base_url()?>user">Home</a></li>  <li>&gt;</li>  
<li>Payment History</li>
</ul>
	</div>

<div class="bodyContainer">
<div class="wrapper">
	
<?php $this->load->view('frontend/common/sidebar');?>

<div class="col-sm-9 float-left">
	<div class="rightsideSection shadoSection">
	<h1>Payment History</h1>
		
	<table class="table table-striped">
  <thead class="thead-dark tableSeeGreenHead">
    <tr>
      <th scope="col">Sl No</th>
      <th scope="col"># ID</th>
      <th scope="col">Date</th>
      <th scope="col">Amount</th>
      <th scope="col">Cancel</th>
      <th scope="col">Expiry/Renew Date </th>
      <th scope="col">Status</th>
      
    </tr>
  </thead>
  <tbody>
       <?php if($pay){
                    $i = 0;
            foreach($pay as $p){   ?>

    <tr>
      <td><?php  echo ++$i;?></th>
      <td><?php if(isset($p->txn_id)){ echo $p->txn_id; }?></td>
      <td><?php if(isset($p->trans_dt)){ echo date("d/m/Y",strtotime($p->trans_dt)); }?></td>
      <td>$<?php if(isset($p->amount)){ echo $p->amount; }?></td>
      <td>
          <?php if(isset($p->subs_type) &&  $p->subs_type!= '1') { ?>
        <?php if(isset($p->subs_status)){ if($p->subs_status == 'A') {

                        if($p->pay_mode == 'S'){

          ?>
                 
          <a href="<?=base_url()?>StripeController/cancel_subscription?sub=<?php if(isset($p->txn_id)){ echo $p->txn_id; }?>"><i class="fa fa-ban" aria-hidden="true" style="color: #ef3f36;" ></i></a>

            <?php       }else{ ?>

      <a href="<?=base_url()?>Paypal/cancel_subscription?sub=<?php if(isset($p->txn_id)){ echo $p->txn_id; }?>"><i class="fa fa-ban" aria-hidden="true" style="color: #ef3f36;" ></i></a>


      <?php    }   } } ?>

       <?php } ?>

      <!--   <a href="<?=base_url()?>StripeController/cancel_subscription?sub=<?php if(isset($p->txn_id)){ echo $p->txn_id; }?>"><i class="fa fa-ban" aria-hidden="true" style="color: #ef3f36;" ></i></a> -->


      </td>
      <td><?php if(isset($p->to_dt)){ echo date("d/m/Y",strtotime($p->to_dt)); }?></td>
       <td>
            
        <?php if(isset($p->subs_status)){ if($p->subs_status == 'A') {echo '<i class="fa fa-check" style="color: #13a89e;" aria-hidden="true"></i>';}else{echo '<i class="fa fa-times" style="color: #ef3f36;" aria-hidden="true"></i>';}}?>
         
       </td>
    </tr>
   	
    <?php    }  }else{  ?>
                  <tr><td colspan="7">NO DATA</td></tr>


    <?php } ?>
  </tbody>
</table>



		
		
	</div>
</div>
	
	<br clear="all">

</div>
</div>
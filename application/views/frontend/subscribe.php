<div class="breadcrumb">

	<ul>

<li><a href="<?=base_url()?>user">Home</a></li>  <li>&gt;</li>  

<li>Subscribe</li>

</ul>

	</div>

<div class="bodyContainer">

<div class="wrapper">



<div class="memberShipArea">

<h1>Subscription Page</h1>



  <div class="tab-content">

    <div id="companyMembership" class="tabContent">



      <table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tbody>

  <tr>

    <td class="tabTitle monthYearly">



	  Select the subcription plan as per your requirement

	  </td>

    <td class="tabBronze">



		<div class="priceChart">One Day</div>

		<h2>

      <?php foreach($rates as $ra){

                if($ra->id == 1){

                  $actual_price1 = $ra->amount;

                  $discount1     = $ra->discount;

                  $dis_price1    = $ra->dis_amt;

                }

              }

              if($discount1 > 0){

       ?>



<h2><span>$ <?=$dis_price1?> / Day</span>

  <input type="hidden" name="amount" value="<?=$dis_price1?>">

<span class="lineThrou">($<?=$actual_price1?>)</span></h2>

<h3><?=$discount1?>% Discount</h3>

<?php } else{ ?> 

              <input type="hidden" name="amount" value="<?=$dis_price1?>">

   <span>$ <?=$dis_price1?> / Day</span>  <?php }  ?>



</td>

    <td class="tabSilver topTd">

		<div class="priceChart">One Week</div>

       <?php foreach($rates as $ra){

                if($ra->id == 2){

                  $actual_price2 = $ra->amount; 

                  $discount2     = $ra->discount;

                  $dis_price2    = $ra->dis_amt;



                }

              }

               if($discount2 > 0){

       ?>

		<h2><span>$ <?=$dis_price2?> / Week</span>

       <input type="hidden" name="amount" value="<?=$dis_price2?>">

<span class="lineThrou">($<?=$actual_price2?>)</span></h2>

<h3><?=$discount2?>% Discount</h3>

<?php } else{ ?>  <input type="hidden" name="amount" value="<?=$dis_price2?>">

  <h2> <span>$ <?=$dis_price2?> / Week</span></h2>  <?php }  ?>

</td>

    <td class="tabGold">

		<div class="priceChart">One Month</div>

     <?php foreach($rates as $ra){

                if($ra->id == 3){

                  $actual_price3 = $ra->amount; 

                   $discount3    = $ra->discount;

                  $dis_price3    = $ra->dis_amt;

                }

              }

                if($discount3 > 0){

       ?>

		<h2><span>$ <?=$dis_price3?> / Month</span>

       <input type="hidden" name="amount" value="<?=$dis_price3?>">

<span class="lineThrou">($<?=$actual_price3?>)</span></h2>

<h3><?=$discount3?>% Discount</h3>

<?php } else{ ?> 

     <input type="hidden" name="amount" value="<?=$dis_price3?>">

  <h2> <span>$ <?=$dis_price3?> / Month</span> </h2> <?php }  ?>

</td>

  </tr>

  <tr>

    <td class="titleCol"><p>Access to Membership  

  <!--<span>(Lorem ipsum dolor sit)</span> -->
</p></td>

    <td class="bronzeCol"><p class="mostPop2">Good for quick searcher</p></td>

    <td class="silverCol"><p class="mostPop">Most Popular</p></td>

    <td class="goldCol"><p class="mostPop2">Best plane for University Student</p></td>

  </tr>

  </tbody>

  <tfoot>

  <tr>

    <td>&nbsp;</td>

    <td>
    <a href="<?=base_url()?>Paypal/second?amt=<?=$dis_price1?>&prod_id=1" class="paypleBtn"><img src="<?=base_url()?>frontend/images/paypal.png" alt=""></a>
    
    <a href="<?=base_url()?>StripeController/spay?amt=<?=$dis_price1?>&prod_id=1" class="stripeBtn"><img src="<?=base_url()?>frontend/images/stripe.png" alt=""></a>
    
    </td>

    <td class="botTd">
    <a href="<?=base_url()?>Paypal/subscription?amt=<?=$dis_price2?>&prod_id=2" class="paypleBtn"><img src="<?=base_url()?>frontend/images/paypal.png" alt=""></a>
    <a href="<?=base_url()?>StripeController/spay?amt=<?=$dis_price2?>&prod_id=2" class="stripeBtn"><img src="<?=base_url()?>frontend/images/stripe.png" alt=""></a>
    
    </td>

    <td>
    <a href="<?=base_url()?>Paypal/subscription?amt=<?=$dis_price3?>&prod_id=3" class="paypleBtn"><img src="<?=base_url()?>frontend/images/paypal.png" alt=""></a>
    <a href="<?=base_url()?>StripeController/spay?amt=<?=$dis_price3?>&prod_id=3" class="stripeBtn"><img src="<?=base_url()?>frontend/images/stripe.png" alt=""></a>
    </td>

  </tr>

  </tfoot>

</table>

    </div>

    

  </div>

<p class="noteNew">*  Billed as per plan selected. <br>
*  Non Refundable and Non transferable. <br>
*  You are accepting all the terms and conditions. <br>
*  24x7 support. </p>

    </div>



	

</div>

</div>


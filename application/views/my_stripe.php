<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
    </style>
</head>
<body>
     
<div class="container">
     <center><h1>Stripe Payment  </h1><br/></center>
    
     
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="<?=base_url()?>frontend/images/logo.jpg">
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
    
                    <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p><?php echo $this->session->flashdata('success'); ?></p>
                    </div>
                    <?php } ?>
          <?php   if($product_id > 1) { ?>
                    <form role="form" action="<?php echo base_url()?>StripeController/create" method="post" class="require-validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>"
                                                    id="payment-form">
              <?php }else{ ?>
 <form role="form" action="<?php echo base_url()?>StripeController/stripePost" method="post" class="require-validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>"
                                                    id="payment-form">
                 <?php } ?>

                        <input type="hidden" name ="amount" value="<?=$amount?>">
                        <input type="hidden" name ="product_id" value="<?=$product_id?>">
                 <?php   if($product_id == 2) { ?>
                <input name="plan" type="hidden" value="Week" />         
                <input name="interval" type="hidden" value="week" />         
                   <?php  } elseif($product_id == 3) { ?>
                 <input name="plan" type="hidden" value="Month" />         
                <input name="interval" type="hidden" value="month" />     
                    <?php  } ?>
                <input name="currency" type="hidden" value="usd" />
                  <div class='form-row row'>

                            <div class='col-xs-12 col-md-6 form-group cvc required'>
                                <label class='control-label'>Name</label>
                                <?php echo $this->session->userdata('first_name') ?> <?php echo $this->session->userdata('last_name') ?>
                                <input type="hidden" value="<?php echo $this->session->userdata('first_name') ?> <?php echo $this->session->userdata('last_name') ?>" name="name">
                    
                            </div>
                            <div class='col-xs-12 col-md-6 form-group expiration required'>
                                <label class='control-label'>Email</label>
                           <input type="hidden" value="" email="<?php echo $this->session->userdata('user_email'); ?>">
                                <?php echo $this->session->userdata('user_email'); ?>
                            </div>
                         
                        </div>
             <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Address</label> <input
                                    class='form-control' size='4' type='text' name="line1"
                                                                    value=""
                                    >
                            </div>
                        </div>
     
                 <div class='form-row row'>

                            <div class='col-xs-12 col-md-6 form-group  required'>
                                <label class='control-label'>City</label>
                    <input autocomplete='off'  name="city"
                                    class='form-control '  size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-6 form-group  required'>
                                <label class='control-label'>State</label>
                         <input class='form-control' 
                         size='2' name="state"
                                    type='text'>
                            </div>
                            
                         
                        </div>

                    <div class='form-row row'>
                    <div class='col-xs-12 col-md-6 form-group expiration required'>
                                <label class='control-label'>ZIP</label> <input
                                    class='form-control'  size='2' name="postal_code"
                                    type='text'>
                            </div>
                          
                            <div class='col-xs-12 col-md-6 form-group expiration required'>
                                <label class='control-label'>Country</label>

                       <select class="form-control" name="country">
  
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="BE">Belgium</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BR">Brazil</option>
                            <option value="CA">Canada</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="DK">Denmark</option>
                            <option value="EE">Estonia</option>
                            <option value="FI">Finland</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                            <option value="GR">Greece</option>
                            <option value="HK">Hong Kong</option>
                            <option value="HU">Hungary</option>
                            <option value="IN">India</option>
                            <option value="IE">Ireland</option>
                            <option value="IT">Italy</option>
                            <option value="JP">Japan</option>
                            <option value="LV">Latvia</option>
                            <option value="LT">Lithuania</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MY">Malaysia</option>
                            <option value="MT">Malta</option>
                            <option value="MX">Mexico</option>
                            <option value="NL">Netherlands</option>
                            <option value="NZ">New Zealand</option>
                            <option value="NO">Norway</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="RO">Romania</option>
                            <option value="SG">Singapore</option>
                            <option value="SK">Slovakia</option>
                            <option value="SI">Slovenia</option>
                            <option value="ES">Spain</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US">United States</option>
                            
                       </select>
                            </div>
                            
                         
                        </div>
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4' type='text'>
                            </div>
                        </div>
     
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label>
                                <input
                                    autocomplete='off' class='form-control card-number' size='20' name="number"
                                    type='text'>
                            </div>
                        </div>
      
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label>
                                <input autocomplete='off' name="cvc"
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label>
                                <input class='form-control card-expiry-month' placeholder='MM' size='2' name="exp_month"
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label>
                                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' name="exp_year"
                                    type='text'>
                            </div>
                        </div>
      
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
      
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($<?=$amount?>)</button>
                            </div>
                        </div>
                             
                    </form>
                </div>
            </div>        
        </div>
    </div>
         
</div>
     
</body>  
     
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
     
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
     
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
    
  });
      
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
</script>

<script>
    $(document).ready(function () {

    var bom ="[{country: 'Australia', code: 'AU'},{country: 'Austria', code: 'AT'},{country: 'Belgium', code: 'BE'},{country: 'Bulgaria', code: 'BG'},{country: 'Brazil ', code: 'BR'},{country: 'Canada', code: 'CA'},{country: 'Cyprus', code: 'CY'},{country: 'Czech Republic', code: 'CZ'},{country: 'Denmark', code: 'DK'},{country: 'Estonia', code: 'EE'},{country: 'Finland', code: 'FI'},{country: 'France', code: 'FR'},{country: 'Germany', code: 'DE'},{country: 'Greece', code: 'GR'},{country: 'Hong Kong', code: 'HK'},{country: 'Hungary', code: 'HU'},{country: 'India', code: 'IN'},{country: 'Ireland', code: 'IE'},{country: 'Italy', code: 'IT'},{country: 'Japan', code: 'JP'},{country: 'Latvia', code: 'LV'},{country: 'Lithuania', code: 'LT'},{country: 'Luxembourg', code: 'LU'},{country: 'Malaysia', code: 'MY'},{country: 'Malta', code: 'MT'},{country: 'Mexico ', code: 'MX'},{country: 'Netherlands', code: 'NL'},{country: 'New Zealand', code: 'NZ'},{country: 'Norway', code: 'NO'},{country: 'Poland', code: 'PL'},{country: 'Portugal', code: 'PT'},{country: 'Romania', code: 'RO'},{country: 'Singapore', code: 'SG'},{country: 'Slovakia', code: 'SK'},{country: 'Slovenia', code: 'SI'},{country: 'Spain', code: 'ES'},{country: 'Sweden', code: 'SE'},{country: 'Switzerland', code: 'CH'},{country: 'United Kingdom', code: 'GB'},{country: 'United States', code: 'US'}]";

      data = JSON.parse(bom);
  console.log("dfsf");
      console.log(bom);

 })



</script>
</html>
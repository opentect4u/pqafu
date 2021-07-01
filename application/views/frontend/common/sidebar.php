<div class="col-sm-3 float-left">
	<div class="leftSidebar">
		
	<?php if($this->session->userdata('user_pic')){?>
	<div class="thumbnail" style="background: url('<?=base_url()?>uploads/profile/<?php echo $this->session->userdata('user_pic') ?>') no-repeat center center; background-size: cover;">

		<?php /*?><?php if($this->session->userdata('user_pic')){?>
		<img src="<?=base_url()?>uploads/profile/<?php echo $this->session->userdata('user_pic') ?>" alt="...">
		<?php } else{?>
			<img src="<?=base_url()?>frontend/images/listDefaultBig.png" alt="...">
		<?php } ?><?php */?>

		<!-- <img src="<?//=base_url()?>frontend/images/<?php //echo $this->session->userdata('user_pic') ?>" alt=""/> -->
	</div>
	<?php } else{?>
		<div class="thumbnail" style="background: url('<?=base_url()?>frontend/images/listDefaultBig.png') no-repeat center center; background-size: cover;">&nbsp;</div>
	<?php } ?>	
		
		
		<div class="personalData">
		<ul>
		<li class="user"><?php echo $this->session->userdata('first_name') ?> <?php echo $this->session->userdata('last_name') ?></li>
		<!-- <li class="email"><a href="mailto:<?php //echo $this->session->userdata('user_email') ?>"><?php //echo $this->session->userdata('user_email') ?></a></li> -->
		<li class="email"><a href="mailto:<?php echo $this->session->userdata('user_email'); ?>">Send Your Message</a></li>
		</ul>
		</div>
		
		 <div class="navigation">
		<ul>

			<?php 

            $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


			?>
		<li class="<?php if (strpos($url,'myquestion') !== false) {
    echo 'active';
}?>" ><a href="<?=base_url()?>user/myquestion">My Question</a></li>
		<li class="<?php if (strpos($url,'myorder') !== false) {
    echo 'active';
}?>"><a href="<?=base_url()?>user/myorder">My Order</a></li>
		<li class="<?php if (strpos($url,'paymenthistory') !== false) {
    echo 'active';
}?>">
<a href="<?=base_url()?>user/paymenthistory">Payment History</a></li>
		
		<li class="<?php if (strpos($url,'myfavourite') !== false) {
    echo 'active';
}?>">
<a href="<?=base_url()?>user/myfavourite">My Favorites</a></li>

		<li class="<?php if (strpos($url,'portfolio_updateProfile') !== false) {
    echo 'active';
}?>">
<a href="<?=base_url()?>user/portfolio_updateProfile">Update Profile</a></li>
		</ul>
		<a href="<?=base_url()?>user/subscribe" class="btn orgBtn">Subscribe <i class="fa fa-rocket" aria-hidden="true"></i>
</a>	 
			 
		</div>
	</div>
</div>
<div class="col-sm-3 float-left">
	<div class="leftSidebar">
	<div class="thumbnail"><img src="<?=base_url()?>frontend/images/<?php echo $this->session->userdata('user_pic') ?>" alt=""/></div>
		<div class="personalData">
		<ul>
		<li class="user"><?php echo $this->session->userdata('user_name') ?></li>
		<li class="email"><a href="mailto:<?php echo $this->session->userdata('user_email') ?>"><?php echo $this->session->userdata('user_email') ?></a></li>
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
}?>"><a href="<?=base_url()?>user/paymenthistory">Payment History</a></li>
		<li class="<?php if (strpos($url,'mysubscription') !== false) {
    echo 'active';
}?>"><a href="<?=base_url()?>user/mysubscription/">My Subscription</a></li>
		<li class="<?php if (strpos($url,'myfavourite') !== false) {
    echo 'active';
}?>"><a href="<?=base_url()?>user/myfavourite">My Favorites</a></li>

		<li class="<?php if (strpos($url,'portfolio_updateProfile') !== false) {
    echo 'active';
}?>"><a href="<?=base_url()?>user/portfolio_updateProfile">Update Profile</a></li>
		</ul>
		</div>
	</div>
</div>
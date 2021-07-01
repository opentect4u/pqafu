<header class="header-banner text-white">
<div class="wrapper">
<div class="col-sm-6">
  <span>Welcome to</span>
  <h4>Perfect Question Answer For U</h4>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra. </p>
  <a href="<?=base_url()?>about" class="btn orgBtn">Read More &gt;&gt; </a>
</div>
</div>
</header>
<div class="wrapper homeBotPading">
<div class="col-sm-9 float-left">

<div class="slider-area">           
  <div class="txt">
	 <h2 class="pt">47368 <span class="text-white">+ </span>Solved Paper</h2>
	 <p> Textbook Question Solutions</p>
	 <h2>Quick, Easy and Reliable</h2>
	 <a href="<?=base_url()?>post_question" class="btn orgBtn">Ask New Questions</a>
  </div>   
</div>

<div id="seach_result">
	



</div>

<div id="search">

	<div class="post-box" id="myList">

		<?php //echo "<pre>";var_dump($question);exit;


		foreach($question as $ques) {   ?>
			
	   <div class="listBox">
		<?php if($ques->qts_type == 'P') {   ?> 
		<div class="premium">premium</div>
		<?php }else{?>
			<div class="free">FREE</div>
		<?php }?>
	    <div class="listBoxBody">
			<div class="thumbnailBox">
				<?php if(isset($ques->profile_picture)){?>
					<img src="<?=base_url()?>uploads/profile/<?php if(isset($ques->profile_picture)){ echo $ques->profile_picture;}?>" alt="...">
				 <?php } else{?>
				 	<img src="<?=base_url()?>frontend/images/listDefault.png" alt="...">
				 <?php } ?>
			   
			</div>
			<div class="listRightDetails">
				<p><span class="listTitle"><?php if(isset($ques->first_name)){ echo $ques->first_name;}?></span>  Asked: <span><?php echo date("F j, Y",strtotime($ques->ask_dt)) ;?><!-- April 19, 2018 --></span>    Category: <span><?php if(isset($ques->cat_name)){ echo $ques->cat_name;}?></span>      Grade: <span><?php if(isset($ques->grade_name)){ echo $ques->grade_name;}?></span></p>
				  <h3><?php if(isset($ques->question)){ echo $ques->question;}?></h3>
			</div>
		</div>
		<br clear="all">

		 <div class="listBoxFooter">
			
			<a href="<?=base_url()?>home/answer/<?=$ques->id?>" class="btnAns"> <i class="fa fa-comments" aria-hidden="true"></i> <?php echo get_answer_no($ques->id);?> Answer</a>
			<div class="right-btn">
			  <!--  <a href="#" class="like btnAns"> <i class="fa fa-thumbs-up" aria-hidden="true" id="like"></i> 8 Likes</a> -->
			     <button class="like btnAns" value="<?=$ques->id?>"> <i class="fa fa-thumbs-up" aria-hidden="true" ></i> <?php echo get_like_no($ques->id);?> Likes</button>
			   <button class="dislike btnAns" value="<?=$ques->id?>"> <i class="fa fa-thumbs-down" aria-hidden="true"></i> <?php echo get_dislike_no($ques->id);?> Dislike</button>
				<a href="JavaScript:void(0);" class="fevorite" id="<?=$ques->id?>"> <i class="fa fa-heart" aria-hidden="true"></i></a> 

				<!-- <button class="fevorite" value="<?=$ques->id?>"> <a href="#" class="fevorite" value="<?=$ques->id?>"> <i class="fa fa-heart" aria-hidden="true"></i> </button> -->
	 
			</div>
		 </div>
	   </div>
	   
	   <?php }?>
		
	</div>



<div class="paginationSec">
<div class="orgBtn" id="loadMore" ><i class="fa fa-spinner" aria-hidden="true"></i>Load more</div>
<div class="orgBtn" id="showLess"><i class="fa fa-spinner" aria-hidden="true"></i>Show Less</div>

  </div>

  </div>

</div>



<div class="col-sm-3 float-left">
<div class="g-ads">
<img src="<?=base_url()?>frontend/images/ls.jpg" alt="">
</div>

<div class="socialMediaSec">
<h3>Find Us</h3>
<ul>
<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
<li class="mt-4"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
<li class="mt-4"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
</ul>
</div>


			<div class="recentPost">
			<h3>Recent Post</h3>
			<?php foreach($recent_post as $recent) {   ?>	
			<div class="postList">
			<div class="postListBody">
			<div class="thumbnail"><img src="<?=base_url()?>frontend/images/post.png" alt=""></div>
			<div class="postListDetails"><p><a href="<?=base_url()?>home/answer/<?php if(isset($recent->id)){ echo $recent->id;} ?>"><?php if(isset($recent->question)){ echo substr($recent->question, 0, 30);}?> ...</a></p>
			<div class="date">
			<i class="fa fa-calendar" aria-hidden="true"></i>
			<span><?php echo date("d.m.Y",strtotime($recent->approved)) ;?></span>
			</div>
			</div>
			</div>

			</div>

             <?php } ?>
			
				
			</div>

</div>

</div>
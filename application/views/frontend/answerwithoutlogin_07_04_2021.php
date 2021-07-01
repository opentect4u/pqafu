<div class="breadcrumb">
	<ul>
<li><a href="#">Home</a></li>  <li>&gt;</li>  
<li>My Answers</li>
</ul>
	</div>

<div class="bodyContainer">
<div class="wrapper">
	 

<div class="col-sm-9 float-left">
	<div class="rightsideSection">
	

<div class="listBox">
	
	
<div class="listBoxBody">
		<div class="thumbnailBox">

			<?php  
			 
			 if(isset($question->profile_picture)){?>
		<img src="<?=base_url()?>frontend/images/<?php if(isset($ques->profile_picture)){ echo $ques->profile_picture;}?>" alt="...">
		<?php } else{?>
		<img src="<?=base_url()?>frontend/images/listDefault.png" alt="...">
		<?php } ?>
		   <!-- <img src="<?=base_url()?>frontend/images/<?php if(isset($ques->profile_picture)){ echo $ques->profile_picture;}?>" alt="..."> -->
		</div>
		<div class="listRightDetails">
			  <p><span class="listTitle"><?php if(isset($question->first_name)){ echo $question->first_name;}?></span>  Asked: <span><?php echo date("F j, Y",strtotime($question->ask_dt)) ;?></span>    Category: <span><?php if(isset($question->cat_name)){ echo $question->cat_name;}?></span>      Grade: <span><?php if(isset($question->grade_name)){ echo $question->grade_name;}?></span></p>
			  <h3><?php if(isset($question->question)){ echo $question->question; }?></h3>
		</div>
	</div>
	<br clear="all">

	 <div class="listBoxFooter">
		
		<a href="#" class="btnAns"> <i class="fa fa-comments" aria-hidden="true"></i> 
			<?php echo get_answer_no($question->id);?> Answer</a>
		<div class="right-btn">
		  <!--  <a href="#" class="btnAns"> <i class="fa fa-thumbs-up" aria-hidden="true"></i> <?php //echo get_like_no($question->id);?> Likes</a> -->
     <button class="like btnAns" value="<?=$question->id?>"> <i class="fa fa-thumbs-up" aria-hidden="true" ></i> 
     	<?php echo get_like_no($question->id);?> Likes</button>
		     <button class="dislike btnAns" value="<?=$question->id?>"> <i class="fa fa-thumbs-down" aria-hidden="true"></i> <?php echo get_dislike_no($question->id);?> Dislike</button>
		<!--    <a href="#" class="btnAns"> <i class="fa fa-thumbs-down" aria-hidden="true"></i>  <?php //echo get_dislike_no($question->id);?> Dislike</a> -->
	
		<a href="JavaScript:void(0);" class="fevorite" id="<?=$question->id?>"> <i class="fa fa-heart" aria-hidden="true"></i></a> 

		</div>
	 </div>
	<?php    foreach($answer as $ans){ ?>
	<div class="listBoxBodyAnsMain">
	<div class="listBoxBodyAns">
		<div class="thumbnailBox">


		   <img src="<?=base_url()?>frontend/images/c1.jpg" alt="...">
		</div>
		<div class="listRightDetailsAns">
			  <h3><?php if(isset($ans->first_name)){ echo $ans->first_name;}?></h3>
			<p><span>Answered: <?php echo date("F j, Y",strtotime($ans->approved_dt)) ;?> <!-- June 14, 2020 -->
			</span></p>
		</div>
	</div>
	
	<div class="listBoxBodyAnsDetails">
		<p><?php if(isset($ans->answer)){ echo $ans->answer;}?></p> 
		<!--  <a href="#" class="btnAnsssl"> -->

		<div class="listBoxFooter listBoxFooterWithoutLog">
		
		
		<div class="right-btn">
		   <button  class="btnAns btnAnsssl" value="<?php if(isset($ans->id)){ echo $ans->id;}?>"> <i class="fa fa-thumbs-up" aria-hidden="true"></i> <span id="val_<?=$ans->id?>"><?php echo get_ans_like_no($ans->id);?></span> Likes</button>
		   <button class="btnAns btnanssd" value="<?php if(isset($ans->id)){ echo $ans->id;}?>"> <i class="fa fa-thumbs-down" aria-hidden="true"></i>  <span id="bom_<?=$ans->id?>"> <?php echo get_ans_dislike_no($ans->id);?> </span> Dislike </button>
			
		</div>
	 </div>

		
		
		 


	</div>
		
	</div>
	<?php } ?>
	
	<!-- <div class="listBoxBodyAnsMain">
	<div class="listBoxBodyAns">
		<div class="thumbnailBox">
		   <img src="images/c1.jpg" alt="...">
		</div>
		<div class="listRightDetailsAns">
			  <h3>Muhammad Raees</h3>
			<p><span>Answered: June 14, 2020</span></p>
		</div>
	</div>
	
	<div class="listBoxBodyAnsDetails">
		<p>I detest gifts of gold and other precious jewelry to brides; most brides these days (especially among the garbage Bengalis I live amongst now) steal / sell the precious jewelry the groom provides. The Bengali bride brings next to nothing. Only 40% of decent families (only in India and Pakistan) bother to match equally the gifts the groom provides these days. I am not talking about any dowry demands by the groom - I mean traditional Asian cultural trend to provide the bride with her dresses, and jewelry by the groom, and his family. |Even the low paid Christian and Hindu sweepers of Pakistan are more generous and honest in equally matching the groom’s gifts to the brides with household articles, and precious jewelry for the bride to use after the wedding. More then 50% of the marriages in Bangladesh are completely scam marriages as the courts are filled with mostly fraudulent cases (mostly submitted by the bride) with the single selfish ambition to syphon money or property from the groom. I got married twice to 2 separate Bangladeshi woman; the first one was a bit decent in gifting me a few items of formal clothing, and a wrist watch, and 2 normal gold rings.</p>
	</div>
		
	</div> -->
	
	
</div>


		
		
	</div>
</div>
	
<div class="col-sm-3 float-left">
<div class="g-ads" style="margin: 0;">
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


	
<!-- <div class="postList">
<div class="postListBody">
<div class="thumbnail"><img src="images/post.png" alt=""></div>
<div class="postListDetails"><p><a href="#">How to approach applying for a job at a company ...</a></p>
<div class="date">
<i class="fa fa-calendar" aria-hidden="true"></i>
<span>28.01.2021</span>
</div>
</div>
</div>
</div> -->
	
</div>



</div>
	
	
	<br clear="all">

</div>
</div>
<div class="breadcrumb">
	<ul>
<li><a href="<?=base_url()?>user">Home</a></li>  <li>&gt;</li>  
<li>My Answers</li>
</ul>
	</div>

<div class="bodyContainer">
<div class="wrapper">
	
<?php $this->load->view('frontend/common/sidebar');?>

<div class="col-sm-9 float-left">
	<div class="rightsideSection">

<div class="listBox">
	
	
<div class="listBoxBody">
		<div class="thumbnailBox">

			<?php if(isset($question->profile_picture)){?>
					<img src="<?=base_url()?>uploads/profile/<?php if(isset($question->profile_picture)){ echo $question->profile_picture;}?>" alt="...">
				 <?php } else{?>
				 	<img src="<?=base_url()?>frontend/images/listDefault.png" alt="...">
				 <?php } ?>
		  <!--  <img src="images/c1.jpg" alt="..."> -->
		</div>
		<div class="listRightDetails">
			  <p class="topBarCat"><span class="listTitle"><?php if(isset($question->first_name)){ echo $question->first_name;}?></span>  Asked: <span><?php echo date("F j, Y",strtotime($question->ask_dt)) ;?><!-- April 19, 2018 --></span>    Category: <span><?php if(isset($question->cat_name)){ echo $question->cat_name;}?></span>      Grade: <span><?php if(isset($question->grade_name)){ echo $question->grade_name;}?></span></p>
			  <h3><?php if(isset($question->title)){ echo $question->title;}?></h3>
			   <?php if(isset($question->question)){ echo $question->question;}?>
		</div>
	</div>
	<br clear="all">

	 <div class="listBoxFooter">
		
		<a href="JavaScript:void(0);" class="btnAns"> <i class="fa fa-comments" aria-hidden="true"></i><?php echo get_answer_no($question->id);?>  Answer</a>
		<div class="right-btn">
		<!--    <a href="#" class="btnAns"> <i class="fa fa-thumbs-up" aria-hidden="true"></i> 8 Likes</a> -->
		     <button class="like btnAns" value="<?=$question->id?>"> <i class="fa fa-thumbs-up" aria-hidden="true" ></i> <span id="ql_<?=$question->id?>"><?php echo get_like_no($question->id);?></span>  Likes</button>
		  <!--  <a href="#" class="btnAns"> <i class="fa fa-thumbs-down" aria-hidden="true"></i> 3 Dislike</a> -->

		    <button class="dislike btnAns" value="<?=$question->id?>"> <i class="fa fa-thumbs-down" aria-hidden="true"></i><span id="qdl_<?=$question->id?>"> <?php echo get_dislike_no($question->id);?> </span>Dislike</button>

			 <?php 	if(get_favourite_no($this->session->userdata('user_id'),$question->id) > 0 ) { ?>
		<a href="JavaScript:void(0);" class="fevorite active" id="<?=$question->id?>"> 
           <?php } else{ ?>
               <a href="JavaScript:void(0);" class="fevorite" id="<?=$question->id?>"> 
		<?php } ?>



				<i class="fa fa-heart" aria-hidden="true"></i></a>
		</div>
	 </div>
	 <!-------- Answer List  Start   ------>
	 <?php    foreach($answer as $ans){ ?>
	<div class="listBoxBodyAnsMain">
	<div class="listBoxBodyAns">
		<div class="thumbnailBox">
		   <img src="images/c1.jpg" alt="...">
		</div>
		<div class="listRightDetailsAns">
			  <h3><?php if(isset($ans->first_name)){ echo $ans->first_name;} echo $subs_status ;?></h3>
			<p><span>Answered: <?php echo date("F j, Y",strtotime($ans->approved_dt)) ;?></span></p>
		</div>
	</div>
	
	<div class="listBoxBodyAnsDetails">
		<?php if($subs_status == 'E'){ ?>
		<p><?php if(isset($ans->answer)){ $length = strlen($ans->answer);
							
			echo substr($ans->answer, 0, round($length/7));}?>...</p>
         <?php }else{ ?>
<p><?php if(isset($ans->answer)){ echo $ans->answer;}?></p>
         	 <?php } ?>
		<?php if($subs_status == 'E'){ ?>
		<div class="readMoreQuestion"><a href="<?=base_url()?>user/subscribe" class="btn orgBtn" style="color:#FFF;">Read more!</a></div>
           <?php } ?>
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
		<div class="readMoreQuestion">You've reached the end of this preview. <a href="#">Membership</a> to read more! </div>
	</div>
		
	</div> -->
	<!---  Answer List End  -->
	
</div>


		
		
	</div>
</div>
	
	<br clear="all">

</div>
</div>

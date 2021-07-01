<div class="breadcrumb">
	<ul>
<li><a href="<?=base_url()?>user">Home</a></li>  <li>&gt;</li>  
<li>My Favorites</li>
</ul>
	</div>

<div class="bodyContainer">
<div class="wrapper">
	
<?php $this->load->view('frontend/common/sidebar');?>

<div class="col-sm-9 float-left">
	<div class="rightsideSection">
	<h1>My Favorites</h1>
		
	<div class="post-box" id="myList">	
		<?php  
                   if($question){
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
			  <p><span class="listTitle"><?php if(isset($ques->first_name)){ echo $ques->first_name;}?></span>  Asked: <span><?php echo date("F j, Y",strtotime($ques->ask_dt)) ;?></span>    Category: <span><?php if(isset($ques->cat_name)){ echo $ques->cat_name;}?></span>      Grade: <span><?php if(isset($ques->grade_name)){ echo $ques->grade_name;}?></span></span>      Status: <span><?php if(isset($ques->qts_status)){ if($ques->qts_status == 'A'){echo "Approved";}else{ echo "Progress";}}?></span></p>
			  <h3><?php if(isset($ques->question)){ echo $ques->question;}?></h3>
		</div>
	</div>
	<br clear="all">

	 <div class="listBoxFooter">
			<?php if(get_answer_no($ques->id) > 0){ ?>
		<a href="<?=base_url()?>home/answer/<?=$ques->id?>" class="btnAns"> <i class="fa fa-comments" aria-hidden="true"></i> <?php echo get_answer_no($ques->id); ?> Answer</a>
		  <?php }?>
		<div class="right-btn">
		 <button class="like btnAns" value="<?=$ques->id?>">  <i class="fa fa-thumbs-up" aria-hidden="true"></i> <span id="ql_<?=$ques->id?>"> <?php echo get_like_no($ques->id);?> </span> Likes</button>
		  <button class="dislike btnAns" value="<?=$ques->id?>"> <i class="fa fa-thumbs-down" aria-hidden="true"></i><span id="qdl_<?=$ques->id?>"> <?php echo get_dislike_no($ques->id);?></span> Dislike </button>
		<a href="JavaScript:void(0);" class="fevorite active" id="<?=$ques->id?>"> <i class="fa fa-heart" aria-hidden="true"></i></a> 
		</div>
	 </div>
</div>
   <?php } }else{  ?>

<div class="listBox">
	<p>NO DATA</p>
</div>

   <?php } ?>
</div>	

<!-- <div class="listBox">	
<div class="listBoxBody">
		<div class="thumbnailBox">
		   <img src="images/c1.jpg" alt="...">
		</div>
		<div class="listRightDetails">
			  <p><span class="listTitle">James Smith</span>  Asked: <span>April 19, 2018</span>    Categories: <span>education</span>      Grade: <span>PHD</span></p>
			  <h3>Why are the british counfused about us calling bread rolls "biscuits"<br> when they callbread roll puddings" ?</h3>
		</div>
	</div>
	<br clear="all">

	 <div class="listBoxFooter">
		
		<a href="#" class="btnAns"> <i class="fa fa-comments" aria-hidden="true"></i> 0 Answer</a>
		<div class="right-btn">
		   <a href="#" class="btnAns"> <i class="fa fa-thumbs-up" aria-hidden="true"></i> 8 Likes</a>
		   <a href="#" class="btnAns"> <i class="fa fa-thumbs-down" aria-hidden="true"></i> 3 Dislike</a>
			<a href="#" class="fevorite"> <i class="fa fa-heart" aria-hidden="true"></i>
</a>
		</div>
	 </div>
</div>
 -->
<!-- <div class="listBox">
	
	<div class="premium">premium</div>
<div class="listBoxBody">
		<div class="thumbnailBox">
		   <img src="images/c1.jpg" alt="...">
		</div>
		<div class="listRightDetails">
			  <p><span class="listTitle">James Smith</span>  Asked: <span>April 19, 2018</span>    Categories: <span>education</span>      Grade: <span>PHD</span></p>
			  <h3>Why are the british counfused about us calling bread rolls "biscuits"<br> when they callbread roll puddings" ?</h3>
		</div>
	</div>
	<br clear="all">

	 <div class="listBoxFooter">
		
		<a href="#" class="btnAns"> <i class="fa fa-comments" aria-hidden="true"></i> 0 Answer</a>
		<div class="right-btn">
		   <a href="#" class="btnAns"> <i class="fa fa-thumbs-up" aria-hidden="true"></i> 8 Likes</a>
		   <a href="#" class="btnAns"> <i class="fa fa-thumbs-down" aria-hidden="true"></i> 3 Dislike</a>
			<a href="#" class="fevorite"> <i class="fa fa-heart" aria-hidden="true"></i>
</a>
		</div>
	 </div>
</div>

<div class="listBox">
	
	
<div class="listBoxBody">
		<div class="thumbnailBox">
		   <img src="images/c1.jpg" alt="...">
		</div>
		<div class="listRightDetails">
			  <p><span class="listTitle">James Smith</span>  Asked: <span>April 19, 2018</span>    Categories: <span>education</span>      Grade: <span>PHD</span></p>
			  <h3>Why are the british counfused about us calling bread rolls "biscuits"<br> when they callbread roll puddings" ?</h3>
		</div>
	</div>
	<br clear="all">

	 <div class="listBoxFooter">
		
		<a href="#" class="btnAns"> <i class="fa fa-comments" aria-hidden="true"></i> 0 Answer</a>
		<div class="right-btn">
		   <a href="#" class="btnAns"> <i class="fa fa-thumbs-up" aria-hidden="true"></i> 8 Likes</a>
		   <a href="#" class="btnAns"> <i class="fa fa-thumbs-down" aria-hidden="true"></i> 3 Dislike</a>
			<a href="#" class="fevorite"> <i class="fa fa-heart" aria-hidden="true"></i>
</a>
		</div>
	 </div>
</div> -->
		
		
	</div>
</div>
	
	<br clear="all">

</div>
</div>
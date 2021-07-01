<div class="breadcrumb">
	<ul>
<li><a href="#">Home</a></li>  <li>&gt;</li>  
<li>Search Question</li>
</ul>
	</div>

<div class="bodyContainerListing">
<div class="wrapper">
	
<div class="col-sm-3 float-left">
	
	<div class="recentPostCatagories">
		<div class="subCatagories">
	<h3>Catagories</h3>
	<?php foreach($category as $cat){ ?>
<div class="checkBoxFilter">
<label class="checkBoxCustomFilter"><?php if(isset($cat->cat_name)){ echo $cat->cat_name;}?>
<input type="checkbox" value="<?php if(isset($cat->cat_name)){ echo $cat->cat_name.'1';}?>" name="cat" >
<span class="checkmarkTextFilter" ></span></label></div>
<?php } ?>

		</div>
		
		<div class="subCatagories">
	<h3>Grade</h3>
		<?php foreach($grade as $gra){ ?>
<div class="checkBoxFilter">
<label class="checkBoxCustomFilter"><?php if(isset($gra->grade_name)){ echo $gra->grade_name;}?>
<input type="checkbox" value='<?php if(isset($gra->grade_name)){ echo $gra->grade_name.'1';}?>' name="grade"><span class="checkmarkTextFilter"></span></label></div>
<?php } ?>


		</div>
		
	<!-- 	<div class="subCatagories">
	<h3>Status</h3>
			
	<div class="form-check formCheckCustom">
  <input class="form-check-input" type="radio" name="exampleRadios" id="inProgress" value="option1" checked>
  <label class="form-check-label" for="inProgress">
    In Progress
  </label>
</div>
			
<div class="form-check formCheckCustom">
  <input class="form-check-input" type="radio" name="exampleRadios" id="solved" value="option1" checked>
  <label class="form-check-label" for="solved">
    Solved
  </label>
</div>
			
		</div> -->
		
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

<div class="col-sm-9 float-left">
	<div class="rightsideSection" id="rightsideSection">

	<?php   if($question) {  

	foreach($question as $ques) {   ?>	

<div class="listBox <?php if(isset($ques->cat_name)){ echo $ques->cat_name.'1';}?> <?php if(isset($ques->grade_name)){ echo $ques->grade_name.'1';}?>">

	<?php if($ques->qts_type == 'P') {   ?> 
		<div class="premium">premium</div>
		<?php }else{ ?>
			<div class="free">FREE</div>
		<?php }?>

<div class="listBoxBody ">
		<div class="thumbnailBox">

		<?php if(isset($ques->profile_picture)){?>
		<img src="<?=base_url()?>frontend/images/<?php if(isset($ques->profile_picture)){ echo $ques->profile_picture;}?>" alt="...">
		<?php } else{?>
		<img src="<?=base_url()?>frontend/images/listDefault.png" alt="...">
		<?php } ?>

		   
		</div>
		<div class="listRightDetails">
			  <p><span class="listTitle"><?php if(isset($ques->first_name)){ echo $ques->first_name;}?></span>  Asked: <span><?php echo date("F j, Y",strtotime($ques->ask_dt)) ;?></span>    Category: <span><?php if(isset($ques->cat_name)){ echo $ques->cat_name;}?></span>      Grade: <span><?php if(isset($ques->grade_name)){ echo $ques->grade_name;}?></span></p>
			  <h3><?php if(isset($ques->question)){ echo $ques->question;}?></h3>
		</div>
	</div>
	<br clear="all">

	 <div class="listBoxFooter">
		<?php if(get_answer_no($ques->id) > 0){ ?>
		<a href="<?=base_url()?>home/answer/<?=$ques->id?>" class="btnAns"> <i class="fa fa-comments" aria-hidden="true"></i><?php echo get_answer_no($ques->id); ?> Answer</a>
	    <?php }?>
		<div class="right-btn">
			<button class="like btnAns" value="<?=$ques->id?>"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span id="ql_<?=$ques->id?>"><?php echo get_like_no($ques->id);?></span> Likes</button>
		 
      <button class="dislike btnAns" value="<?=$ques->id?>"><i class="fa fa-thumbs-down" aria-hidden="true"></i><span id="qdl_<?=$ques->id?>"><?php echo get_dislike_no($ques->id);?></span> Dislike</button>
		
			<a href="#" class="fevorite"> <i class="fa fa-heart" aria-hidden="true"></i>
</a>
		</div>
	 </div>
</div>

   <?php }  }else{ ?>
                <b>No Result Found</b>
		<?php } ?>
<div class="paginationSec">
<!-- <div class="orgBtn" id="loadMore"><i class="fa fa-spinner" aria-hidden="true"></i>Load more</div> -->
<!-- <a href="#" class="orgBtn"><i class="fa fa-spinner" aria-hidden="true"></i> Load More</a> -->

  </div>
	</div>
</div>
	
	<br clear="all">

</div>
</div>

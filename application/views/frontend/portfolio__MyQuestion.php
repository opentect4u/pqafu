<script>
    $(document).ready(function(){
        var list_length = $('#question_list > .listBox').length;
        var counter = 5;
        $('#question_list > div.listBox').slice(0, counter).show();
        if(list_length > counter){
            $('#showLess').hide();
        }else{
            $('#loadMore').hide();
            $('#showLess').hide();
        }
        $('#loadMore').on('click', function(){
            $('.listBox:hidden').slice(0, counter).show();
            if($(".listBox:hidden").length == 0){
                $(this).hide();
                $('#showLess').show();
            }else{
                $('#showLess').show();
            }
        })
        $('#showLess').on('click', function(){
            var ln = $('.listBox:visible').length - counter;
            var ct = 0;
            if(ln >= counter){
                ct = 6;
            }else{
                ct = ln + 1;
            }
            if(ln > 0){
                $('.listBox:gt(-'+ct+')').hide();
                if($('.listBox:visible').length == counter){
                    $(this).hide();
                    $('#loadMore').show();
                }else{
                    $(this).show();
                    $('#loadMore').show();
                }
            }else{
                $(this).hide();
                $('#loadMore').show();
            }
        })
        
    })    
</script>


<div class="breadcrumb">
	<ul>
<li><a href="<?=base_url()?>user">Home</a></li>  <li>&gt;</li>  
<li>My Question</li>
</ul>
	</div>

<div class="bodyContainer">
<div class="wrapper">

	<?php $this->load->view('frontend/common/sidebar');?>


<div class="col-sm-9 float-left">
	<div class="rightsideSection">
	<h1>My Question</h1>

	<!--<div class="post-box" id="myList">-->
	    <div class="post-box" id="question_list">	
		<?php 
                if($question){

		 foreach($question as $ques) {   ?>	

<div class="listBox" style="display:none;">

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
			  <p class="topBarCat"><span class="listTitle"><?php if(isset($ques->first_name)){ echo $ques->first_name;}?></span>  Asked: <span><?php echo date("F j, Y",strtotime($ques->ask_dt)) ;?></span>    Category: <span><?php if(isset($ques->cat_name)){ echo $ques->cat_name;}?></span>      Grade: <span><?php if(isset($ques->grade_name)){ echo $ques->grade_name;}?></span></span>      Status: <span><?php if(isset($ques->qts_status)){ if($ques->qts_status == 'A'){echo "Approved";}else{ echo "Progress";}}?></span></p>
			  <h3><?php if(isset($ques->title)){ echo $ques->title;}?></h3>
			
			
			<?php if(isset($ques->question)){ if(strlen($ques->question) > 150 ) {echo substr($ques->question,0,150).'</p> <a href="' .base_url() . 'home/answer/' . $ques->id .'" class="readMoreQues">Read More >> </a>';}else{
			  	echo $ques->question;
			  }

			}?>
		</div>
	</div>
	<br clear="all">

	 <div class="listBoxFooter">
			<?php //if(get_answer_no($ques->id) > 0){ ?>
		<a href="<?=base_url()?>home/answer/<?=$ques->id?>" class="btnAns"> <i class="fa fa-comments" aria-hidden="true"></i> <?php echo get_answer_no($ques->id); ?> Answer</a>
		  <?php //}?>
		<div class="right-btn">
		 <button class="like btnAns" value="<?=$ques->id?>">  <i class="fa fa-thumbs-up" aria-hidden="true"></i> <span id="ql_<?=$ques->id?>"> <?php echo get_like_no($ques->id);?> </span> Likes</button>
		  <button class="dislike btnAns" value="<?=$ques->id?>"> <i class="fa fa-thumbs-down" aria-hidden="true"></i><span id="qdl_<?=$ques->id?>"> <?php echo get_dislike_no($ques->id);?></span> Dislike </button>
                  <?php 	if(get_favourite_no($this->session->userdata('user_id'),$ques->id) > 0 ) { ?>
			<a href="JavaScript:void(0);" class="fevorite active" id="<?=$ques->id?>"> 
				   <?php } else{ ?>
               <a href="JavaScript:void(0);" class="fevorite" id="<?=$ques->id?>"> 
		<?php } ?>

				<i class="fa fa-heart" aria-hidden="true"></i></a> 
		</div>
	 </div>
</div>
   <?php } } else { ?>

<div class="listBox">
	<p>Ask Your First Question </p>

</div>
   <?php } ?>
</div>
		
	</div>

	<div class="paginationSec">
<div class="orgBtn" id="loadMore"><i class="fa fa-spinner" aria-hidden="true"></i>Load more</div>
<div class="orgBtn" id="showLess"><i class="fa fa-spinner" aria-hidden="true"></i>Show Less</div>
<!-- <a href="#" class="orgBtn"><i class="fa fa-spinner" aria-hidden="true"></i> Load More</a> -->

  </div>
</div>
	
	<br clear="all">

</div>
</div>
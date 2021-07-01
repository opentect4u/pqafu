<footer class="footer-area Copyright">
         <div class="col-md-12 text-center pt-4">
			 <p class="privacy"><a href="<?=base_url()?>privacypolicy">Privacy Policy</a> | <a href="<?=base_url()?>disclaimer">Disclaimer</a> </p>
            <p>Copyright © 2021 | Pqafu | All Rights Reserved</p>
         </div>
</footer>
<?php if(! $this->session->userdata('user_id')){   ?>
      
     <a href="<?=base_url()?>user/subscribe" class="subscriptionBtnCustom"><img src="<?=base_url()?>frontend/images/subdcribe.png" alt=""/></a>
  
     <?php     }  ?>


<!--<script src="<?=base_url()?>frontend/js/bootstrap.min.js"></script>-->
 <script src="<?=base_url()?>ckeditor/ckeditor.js"></script>
              <script src="<?=base_url()?>ckeditor/samples/js/sample.js"></script>
<script src="<?=base_url()?>frontend/js/javascript.js" type="text/javascript" charset="utf-8"></script>
<script src="<?=base_url()?>frontend/js/jquery.js" type="text/javascript" charset="utf-8"></script>

  <script src="<?php echo base_url(); ?>frontend/editor-summernote/libs/summernote-lite.js"></script>

<script src="<?php echo base_url(); ?>frontend/editor-summernote/js/editor-summernote-example.js"></script>
<script>
  initSample();
//     $(document).ready(function() {
//   $('#summernote').summernote();
// });
</script>

<script>



function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
 
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
        //document.getElementById('myform').submit();
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
        //document.getElementById('myform').submit();
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
          document.getElementById('myform').submit();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
      x[i].parentNode.removeChild(x[i]);
    }
  }
}
/*execute a function when someone clicks in the document:*/
document.addEventListener("click", function (e) {
    closeAllLists(e.target);
});
}


$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#search_text").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#search_text').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#display").html("");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "<?=base_url()?>home/livesearch",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name
               },
               //If result found, this funtion will be called.
               success: function(data) {
                 
                var html = '';

                $.each(JSON.parse(data), function( index, value ) {

                 
                    html += '<div class="fill" >'+value.question+'</div>';


                });
             
                     $("#search_textautocomplete-list").html(html);
                  
               }
           });
       }
   });
});


/////   Code Start For Serch Box in    //////

$(document).on('click', '.fill', function(){
  // console.log();
  $('#search_text').val($(this).text());
  $('#search_textautocomplete-list >div').remove()
   $("#myform").submit();

})


$(document).ready(function() {
$('#myform').keydown(function() {
var search_text = $("#search_text").val();
var email = $("#email").val();
var message = $("#message").val();
var key = e.which;
if (key == 13) {
if (search_text == "") {
alert("search is Missing");
} else {
$('#myform').submit();
alert("Form Submitted ...!!");
}
return false;
}
});
});

/////   Code END For Serch Box   //////


$(document).ready(function () {
    size_li = $("#myList > div.listBox").size();
     x=5;
     var count = 5;
    // console.log(size_li);
     var click_count = 0;
     var click_countl = 0;
     var count_range = (size_li/5).toFixed();
     $('#showLess').hide();
    $('#myList > div.listBox:lt('+x+')').show();

    $('#loadMore').click(function () {
      // x  = 5;
          click_count += 1;
          click_countl = 0;
           
        x = (x+5 <= size_li) ? x+5 : size_li;
        console.log(click_count,x);
        $('#myList > div.listBox:lt('+x+')').show();

         if ((click_count * 5) +6 > size_li) {
          $('#showLess').show();
        $(this).hide();
         }
    });


    $('#showLess').click(function () {

     
     click_countl += 1;
     click_count = 0;
     x  = 0;
     $('#myList > div.listBox:lt('+(click_countl*5)+')').hide();
    
    //console.log(count_range);
     //console.log(click_countl);
     //console.log(size_li);
   // if ((size_li - (5*click_countl)) <= 5) {
    if (click_countl == (count_range-1)) {
        $(this).hide();
         $('#loadMore').show();
    }
})
     if($("#myList > div.listBox").length > 5) {
  
     }

    else {
  
      $("#loadMore").css({"display":"none",

      });
    }
});



//$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $(".like").click(function() {

       //Assigning search box value to javascript variable named as "name".
       var sess = "<?php echo $this->session->userdata('user_id'); ?>";
       var name = $(this).val();
       //Validating, if "name" is empty.
       if (sess == '' ) {
           //Assigning empty value to "display" div in "search.php" file.
           var url = '<?php echo base_url()?>';
        window.location.replace(url+"login");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({

               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "<?=base_url()?>user/like_comment",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   q_id: name,
                   user_id:sess
               },
               //If result found, this funtion will be called.
               success: function(data) {

                 data = JSON.parse(data);
                if(data.status == 0 && data.is_input == 0 && data.is_update == 0){
              alert("You have alrady liked this question");
                }else if(data.status == 0 && data.is_input > 0 && data.is_update == 0){
              let a = $('#ql_'+name).text();
              $('#ql_'+name).text(parseInt(a)+1);
                }else if(data.status == 0 && data.is_input > 0 && data.is_update > 0){
              let a = $('#ql_'+name).text();
              $('#ql_'+name).text(parseInt(a)+1);
              let b = $('#qdl_'+name).text();
              $('#qdl_'+name).text(parseInt(b)-1);
                }

              
               }
           });
       }
   });

   $(".btnAnsssl").click(function() {

       //Assigning search box value to javascript variable named as "name".
       var sess = "<?php echo $this->session->userdata('user_id'); ?>";
       var name = $(this).val();
       //Validating, if "name" is empty.
       if (sess == '' ) {
           //Assigning empty value to "display" div in "search.php" file.
           var url = '<?php echo base_url()?>';
        window.location.replace(url+"login");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({

               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "<?=base_url()?>user/answer_like_comment",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   q_id: name,
                   user_id:sess
               },
               //If result found, this funtion will be called.
               success: function(data) {

                   data = JSON.parse(data);
                if(data.status == 0 && data.is_input == 0 && data.is_update == 0){
              alert("You have alrady liked this Answer");
                }else if(data.status == 0 && data.is_input > 0 && data.is_update == 0){
              let a = $('#val_'+name).text();
              $('#val_'+name).text(parseInt(a)+1);
                }else if(data.status == 0 && data.is_input > 0 && data.is_update > 0){
              let a = $('#val_'+name).text();
              $('#val_'+name).text(parseInt(a)+1);
              let b = $('#bom_'+name).text();
              $('#bom_'+name).text(parseInt(b)-1);
                }


                // let a = $('#val_'+name).text();

                // $('#val_'+name).text(parseInt(a)+1);

              
               }
           });
       }
   });


    $(".dislike").click(function() {

       //Assigning search box value to javascript variable named as "name".
       var sess = "<?php echo $this->session->userdata('user_id'); ?>";
       var name = $(this).val();
       //Validating, if "name" is empty.
       if (sess == '' ) {
           //Assigning empty value to "display" div in "search.php" file.
        var url = '<?php echo base_url()?>';
        window.location.replace(url+"login");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({

               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "<?=base_url()?>user/dislike_comment",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   q_id: name,
                   user_id:sess
               },
               //If result found, this funtion will be called.
               success: function(data) {


                  data = JSON.parse(data);
                  if(data.status == 1 && data.is_input == 0 && data.is_update == 0){
                alert("You have alrady disliked this question");
                  }else if(data.status == 1 && data.is_input > 0 && data.is_update == 0){
                let a = $('#qdl_'+name).text();
                $('#qdl_'+name).text(parseInt(a)+1);
                  }else if(data.status == 1 && data.is_input > 0 && data.is_update > 0){
                let a = $('#ql_'+name).text();
                $('#ql_'+name).text(parseInt(a)-1);
                let b = $('#qdl_'+name).text();
                $('#qdl_'+name).text(parseInt(b)+1);
                  }
              
               }
           });
       }
   });

 $(".btnanssd").click(function() {

         //Assigning search box value to javascript variable named as "name".
         var sess = "<?php echo $this->session->userdata('user_id'); ?>";
         var name = $(this).val();
         //Validating, if "name" is empty.
         if (sess == '' ) {
             //Assigning empty value to "display" div in "search.php" file.
             var url = '<?php echo base_url()?>';
          window.location.replace(url+"login");
         }
         //If name is not empty.
         else {
             //AJAX is called.
             $.ajax({

                 //AJAX type is "Post".
                 type: "POST",
                 //Data will be sent to "ajax.php".
                 url: "<?=base_url()?>user/answer_dislike_comment",
                 //Data, that will be sent to "ajax.php".
                 data: {
                     //Assigning value of "name" into "search" variable.
                     q_id: name,
                     user_id:sess
                 },
                 //If result found, this funtion will be called.
                 success: function(data) {


                  data = JSON.parse(data);
                  if(data.status == 1 && data.is_input == 0 && data.is_update == 0){
                alert("You have alrady disliked this Answer");
                  }else if(data.status == 1 && data.is_input > 0 && data.is_update == 0){
                let a = $('#bom_'+name).text();
                $('#bom_'+name).text(parseInt(a)+1);
                  }else if(data.status == 1 && data.is_input > 0 && data.is_update > 0){
                let a = $('#val_'+name).text();
                $('#val_'+name).text(parseInt(a)-1);
                let b = $('#bom_'+name).text();
                $('#bom_'+name).text(parseInt(b)+1);
                  }

                
                 }
             });
         }
     });

///**********   Code Start For Favourite    //////
  
   $(".fevorite").click(function() {

       //Assigning search box value to javascript variable named as "name".
       var sess = "<?php echo $this->session->userdata('user_id'); ?>";
       //var name = $(this).val();
       var name =  $(this).attr("id");
       //Validating, if "name" is empty.
        if (sess == '' ) {
             //Assigning empty value to "display" div in "search.php" file.
             var url = '<?php echo base_url()?>';
         window.location.replace(url+"login");
        }
       //If name is not empty.
      else {
           //AJAX is called.
           $.ajax({

               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "<?=base_url()?>user/favourite",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   q_id: name,
                   user_id:sess
               },
               //If result found, this funtion will be called.
               success: function(data) {

                 data = JSON.parse(data);
                
                if(data.action == 'R' ){
                alert("You have Removed this question From Favourite List");
                $("#"+name).removeClass("active");
                }else{
                   alert("You have Added this question in Your Favourite List");
                   $("#"+name).addClass("active");
                  
                }

               }
           });
       }
   });

// ************* End Code Favourite    /////




//var $filters = $("input:checkbox[name='brand']").prop('checked', true), // start all checked
   $categoryContent = $('#rightsideSection div');
    $errorMessage = $('#errorMessage');

//$filters.click(function () {

    $("input:checkbox[name='cat']").click(function () {
    // if any of the checkboxes for brand are checked, you want to show div's containing their value, and you want to hide all the rest.
   // $categoryContent.hide();
   $('.listBox').hide();
    var $selectedFilters = $("input:checkbox[name='cat']").filter(':checked');
    if ($selectedFilters.length > 0) {
        $errorMessage.hide();
        $selectedFilters.each(function (i, el) {
         
          //  $categoryContent.filter(':contains(' + el.value + ')').show();
           $categoryContent.filter('.'+el.value).show();
          //  $('#rightsideSection > .'+el.value+' div').show()
        });
    } else {
       $('.listBox').show();
    }

});


    $("input:checkbox[name='grade']").click(function () {
    // if any of the checkboxes for brand are checked, you want to show div's containing their value, and you want to hide all the rest.
   // $categoryContent.hide();
   $('.listBox').hide();
    var $selectedFilters = $("input:checkbox[name='grade']").filter(':checked');
    if ($selectedFilters.length > 0) {
        $errorMessage.hide();

        $selectedFilters.each(function (i, el) {
          //  $categoryContent.filter(':contains(' + el.value + ')').show();
           $categoryContent.filter('.'+el.value).show();
          //  $('#rightsideSection > .'+el.value+' div').show()
        });
    } else {
       $('.listBox').show();
    }

});


 
 
</script>
  

</body>
</html>

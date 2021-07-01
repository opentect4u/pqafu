<div class="container-fluid page-body-wrapper">
	

	
<nav class="sidebar sidebar-offcanvas" id="sidebar">
	
	
	 <?php  $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>
        
	
	<ul class="nav">
                               <!--    <li class="nav-header">Menu</li> -->
                                <!--   <li class="nav-divider"></li> -->
                                  <li class="nav-item">
                                    <a href="<?=base_url()?>admin/login/dashboard" class="nav-link" >
                                      <i class="fa fa-dashboard"></i><span class="menu-title">&nbsp;Dashboard</span>
                                    </a>
                                  </li>
                                  <li class="nav-item <?php if (strpos($url,'/category') !== false) { echo 'active'; }?>">
                                    <a href="<?=base_url()?>admin/add_new/category" class="nav-link " >
                                      <i class="fa fa-tag" aria-hidden="true"></i> <span class="menu-title">&nbsp;Category</span>
                                    </a>
                                  </li>  
                                  <li class="nav-item <?php if (strpos($url,'grade') !== false) { echo 'active'; }?>">
                                    <a href="<?=base_url()?>admin/add_new/grade" class="nav-link" >
                                      <i class="fa fa-thumb-tack" aria-hidden="true"></i> <span class="menu-title">&nbsp;Grade</span>
                                    </a>
                                  </li> 
                                  <li class="nav-item <?php if (strpos($url,'orderRate') !== false) { echo 'active'; }?>">
                                    <a href="<?=base_url()?>admin/add_new/orderRate" class="nav-link" >
                                      <i class="fa fa-usd" aria-hidden="true"></i> <span class="menu-title">&nbsp;Order Rate</span>
                                    </a>
                                  </li>
                                    <li class="nav-item <?php if (strpos($url,'orderplaced') !== false) { echo 'active'; }?>">
                                    <a href="<?=base_url()?>admin/add_new/orderplaced" class="nav-link" >
                                      <i class="fa fa-usd" aria-hidden="true"></i> <span class="menu-title">&nbsp;Order Placed</span>
                                    </a>
                                  </li>  
                                  <li class="nav-item <?php if (strpos($url,'subscription') !== false) { echo 'active'; }?>">
                                    <a href="<?=base_url()?>admin/add_new/subscription" class="nav-link" >
                                      <i class="fa fa-usd" aria-hidden="true"></i> <span class="menu-title">&nbsp;Subscription Rate</span>
                                    </a>
                                  </li>                                                               
                                  <li class="nav-item <?php if (strpos($url,'content_writer') !== false) { echo 'active'; }?>">
                                    <a href="<?=base_url()?>admin/add_new/content_writer" class="nav-link" >
                                      <i class="fa fa-pencil-square" aria-hidden="true"></i> <span class="menu-title">&nbsp;Content writers</span>
                                    </a>
                                  </li>
                                  <li class="nav-item <?php if (strpos($url,'question') !== false) { echo 'active'; }?>">
                                    <a href="<?=base_url()?>admin/qa/question" class="nav-link" >
                                      <i class="fa fa-question-circle" aria-hidden="true"></i> <span class="menu-title">&nbsp;Question</span>
                                    </a>
                                  </li>
                                   <li class="nav-item <?php if (strpos($url,'ans_cat') !== false) { echo 'active'; }?>">
                                    <a href="<?=base_url()?>admin/qa/ans_cat" class="nav-link" >
                                      <i class="fa fa-comment" aria-hidden="true"></i> <span class="menu-title">&nbsp;Answer</span>
                                    </a>
                                  </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url()?>index.php/admin/login/logout">
              <i class="mdi mdi-logout menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
                                  </li>
                                </ul>
      </nav>

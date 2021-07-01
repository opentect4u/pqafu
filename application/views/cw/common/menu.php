<?php /*?><div id="left">
                        <div class="media user-media bg-dark dker">
                            <div class="user-media-toggleHover">
                                <span class="fa fa-user"></span>
                            </div>
                          
                        </div>
                        <!-- #menu -->
                        <ul id="menu" class="bg-blue dker">
                               <!--    <li class="nav-header">Menu</li> -->
                                <!--   <li class="nav-divider"></li> -->
                                  <li class="">
                                    <a href="<?=base_url()?>admin/cw">
                                      <i class="fa fa-dashboard"></i><span class="link-title">&nbsp;Dashboard</span>
                                    </a>
                                  </li>
                                  <li class="">
                                    <a href="<?=base_url()?>index.php/admin/cw/qlist">
                                      <i class="fa fa-dashboard"></i><span class="link-title">&nbsp;Question</span>
                                    </a>
                                  </li>
                               <!--    <li class="">
                                    <a href="<?=base_url()?>index.php/admin/cw/ans_category">
                                      <i class="fa fa-dashboard"></i><span class="link-title">&nbsp;Answer</span>
                                    </a>
                                  </li> -->
                                 
                                </ul>
                        <!-- /#menu -->
                </div><?php */?>


<div class="container-fluid page-body-wrapper">
	

	
<nav class="sidebar sidebar-offcanvas" id="sidebar">
	
	
	 <?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>
        
	
	<ul class="nav">
                               <!--    <li class="nav-header">Menu</li> -->
                                <!--   <li class="nav-divider"></li> -->
                                  <li class="nav-item ">
									  <a href="<?=base_url()?>admin/cw" class="nav-link">
                                      <i class="fa fa-dashboard"></i><span class="menu-title">&nbsp;Dashboard</span>
                                    </a>
                                  </li>
                                  <li class="nav-item <?php if (strpos($url,'/qlist') !== false) { echo 'active'; }?>">
                                    <a href="<?=base_url()?>admin/cw/qlist" class="nav-link">
                                      <i class="fa fa-question-circle" aria-hidden="true"></i> <span class="menu-title">&nbsp;Question</span>
                                    </a>
                                  </li>  
                                </ul>
      </nav>






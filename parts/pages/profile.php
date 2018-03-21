<?php  
include_once 'parts/head.php';
include_once 'parts/nav.php';
$console = new jsConsole();
?>
<body class="profile-page side-margin " cz-shortcut-listen="true">    
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('uploads/users/cover_img/<?=userInfo("cover_img",$_SESSION['id'])?>');background-size: cover;background-repeat: no-repeat;transform: translate3d(0px, 0px, 0px);background-position: center center;"></div>
    <div class="main main-raised has-minus-margin">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <img src="uploads/users/profile_img/<?=userInfo("profile_img",$_SESSION['id'])?>" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                            </div>
                            <div class="name">
                                <h2 class="title"><?=userInfo("fname",$_SESSION['id'])?> <?=userInfo("lname",$_SESSION['id'])?></h2>
                                <h6><?=getRole($_SESSION['id']);?></h6>
                                <?php IF (userInfo("facebook_id",$_SESSION['id']) != ">Error<") :?>
                                <a href="https://facebook.com/<?=userInfo("facebook_id",$_SESSION['id'])?>" class="btn btn-just-icon btn-link btn-facebook" target="_blank"><i class="fa fa-facebook"></i></a>                                
                                <?php ENDIF; ?>                                                                
                            </div>
                        </div>
                        <div class="follow">
                            <?php if ($_SESSION['role'] == 2): ?>                               
                            <!-- IF USER IS RETAURANT OWNER -->
                             <a href="#msgEditor"  data-toggle="modal" data-target="#sendEditorMsg" class="btn btn-fab btn-primary btn-round" rel="tooltip" title="" data-original-title="Contact Editor">
                                <i class="material-icons">message</i>
                            </a>
                            <?php endif ?>
                            <a href="account.php?settings" class="btn btn-fab btn-primary btn-round" rel="tooltip" title="" data-original-title="Profile Settings">
                                <i class="material-icons">settings</i>
                            </a>                            
                        </div>
                    </div>
                </div>
                <div class="description text-center">
                       <?=userInfo("short_desc",$_SESSION['id'])?>
                       <div class="spacing-80"></div> 
                    </div>  
              
                          
          
                
                      

<section class="section">
<?php if ($_SESSION['role'] == 2): ?>                
    <?php include_once 'parts/RestaurantOwnerDashboard.php'; ?>
<?php endif ?>
</section>
            </div>
        </div>
    </div>    
<style type="text/css">
    .modal-backdrop.show{
        z-index: 0;
    }
</style>
<?php include_once 'parts/footer.php'; ?>
<?php  
include_once 'parts/head.php';
include_once 'parts/nav.php';

$console = new jsConsole();
?>
<body class="profile-page side-margin" cz-shortcut-listen="true">    
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('uploads/users/cover_img/<?=userInfo("cover_img",$_SESSION['id'])?>');;background-size: cover;background-repeat: no-repeat;transform: translate3d(0px, 0px, 0px);background-position: center center;"></div>
    <div class="main main-raised has-minus-margin">
        <div class="profile-content">
            <div class="container">

<?php include_once 'processors/parseProfileChanges.php'; ?>
<form id="basic_profile_info_form" action="" method="post" enctype="multipart/form-data">
<div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail img-circle img-raised">
                                    <img src="uploads/users/profile_img/<?=userInfo("profile_img",$_SESSION['id'])?>" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                <div>
                                    <span class="btn btn-raised btn-round btn-default btn-file">
                                        <span class="fileinput-new">Change</span>
                                        <span class="fileinput-exists">Cancel</span>
                                        <input type="file" name="profile_img" accept="image/*" />
                                    </span>
                                    <br />
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>                            
                            <div class="name">                                
                                <h6><?=getRole($_SESSION['id']);?></h6>
                                <div class="social text-center">  
                                    <?php IF (userInfo("facebook_id",$_SESSION['id']) == "" || userInfo("facebook_id",$_SESSION['id']) == 'undefined' || userInfo("facebook_id",$_SESSION['id']) == null ) :?>
                                    <a href="<?= $_GLOBALS['fb_login_url'];?>" class="btn btn-just-icon btn-round btn-facebook" rel="tooltip" data-placement="bottom" title="" data-original-title="Interget FB">
                                    <i class="fa fa-facebook"> </i>
                                    </a>      
                                    <?php ENDIF;?>                              
                                 </div>                                                               
                            </div>
                        </div>                        
                    </div>
                </div>

<!-- COVER CHANGE -->
<div class="row">
    <div class="col-md-8 ml-auto mr-auto">
        <h4 class="title"> Change Cover </h4>
        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                <div class="fileinput-new thumbnail img-raised">
                    <img src="uploads/users/cover_img/<?=userInfo("cover_img",$_SESSION['id'])?>" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                <div>
                    <span class="btn btn-raised btn-round btn-default btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="cover_img" accept="image/*"/>
                    </span>
                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                </div>
            </div>
    </div>
    
</div>
<!--/ COVER CHANGE -->

<!-- BASIC INFO -->
<div class="row">
      <div class="col-md-6 ml-auto mr-auto">
          <div class="profile-tabs">
              <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">                  
                  <li class="nav-item">
                      <a class="nav-link active" href="#work" role="tab" data-toggle="tab">
                          <i class="material-icons">palette</i> About Me
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#connections" role="tab" data-toggle="tab">
                          <i class="material-icons">people</i> Basic Info
                      </a>
                  </li>                  
              </ul>
          </div>
      </div>
  </div>
  <div class="tab-content tab-space">
      <div class="tab-pane active work" id="work">
        <div class="row">
          <div class="col-md-12">
            <h4 class="title">About Me</h4>
              <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="input-group">                                
                    <textarea class="wysig form-control" name="short_desc"><?=userInfo("short_desc",$_SESSION['id'])?></textarea>
                  </div>                              
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="tab-pane connections" id="connections">
           <div class="row">
                    
                    <div class="col-md-12">
                        <div class="spacing-80"></div>                        
                          <h4 class="title">Basic Info</h4>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="material-icons">group</i>
                                  </span>
                                </div>
                                <input type="text" class="form-control" placeholder="First Name" name="fname" value="<?= userInfo("fname",$_SESSION['id']);?>">
                              </div>                              
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">                                
                                <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?= userInfo("lname",$_SESSION['id']);?>">
                              </div>                              
                            </div>
                          </div>
                           <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="material-icons">email</i>
                                  </span>
                                </div>
                                <input type="email" class="form-control" placeholder="Email" name="email"  value="<?= userInfo("email",$_SESSION['id']);?>">
                              </div>                              
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group"> 
                                 <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="material-icons">local_phone</i>
                                  </span>
                                </div>                               
                                <input type="tel" class="form-control" placeholder="Phone Number" name="phone"  value="<?= userInfo("phone",$_SESSION['id']);?>">
                              </div>                              
                            </div>
                          </div>                         
                    </div>
                    
                </div>  
      </div>     
  </div>
<!--/ BASIC INFO -->
                
  <div class="row">
      <div class="col-md-8  center-forced">
          <button type="submit" class="btn btn-default brown darken-3" name="profile_change">Save Changes</button> 
          <div class="spacing-40"></div>   
      </div>
      
  </div>
</form> 

<!-- PASSWORD CHANGES -->
<?php include_once 'processors/parsePasswordReset.php'; ?>
<form id="password_change_form" action="" method="post" data-toggle="validator">

                 <div class="row">                    
                    <div class="col-md-12">
                        <div class="spacing-80"></div>
                        <h4 class="title">Change Password</h4>  
                        
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="material-icons">lock_open</i>
                                  </span>
                                </div>
                                <input type="password" class="form-control" id="old" placeholder="new password" data-minlength="6" data-minlength="6" name="new_password">
                              </div>                              
                            </div>
                             <div class="form-group col-md-6">
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="material-icons">lock_outline</i>
                                  </span>
                                </div>
                                <input type="password" class="form-control" placeholder="confirm password" data-match="#old" data-match-error="Whoops, these don't match" data-minlength="6" name="confirm_password">
                                 <div class="help-block with-errors"></div>
                              </div>                              
                            </div>
                          </div>                                                                                        
                    </div>                    
                </div>  
                 <div class="row">
                    <div class="col-md-8  center-forced">
                      <input type="hidden" name="email" value="<?=userInfo("email",$_SESSION['id']);?>">
                        <button type="submit" class="btn btn-default brown darken-3" name="passResetBtn">Change Passowrd</button> 
                        <div class="spacing-40"></div>   
                    </div>
                    
                </div>
</form>
                             
            </div>
        </div>
    </div>    

<?php include_once 'parts/footer.php'; ?>
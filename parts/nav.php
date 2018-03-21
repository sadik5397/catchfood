<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg " color-on-scroll="100" id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="/"><img src="http://catchfood.net/wp-content/uploads/11-11.png"> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">
                            <i class="material-icons">home</i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="material-icons">restaurant</i> Restaurant
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="material-icons">star_half</i> Reviews
                        </a>
                    </li>                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="material-icons">tag_faces</i> Today's Offers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Blog
                        </a>
                    </li>
                    <!-- <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="material-icons">apps</i> Components
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a href="./index.html" class="dropdown-item">
                                <i class="material-icons">layers</i> All Components
                            </a>
                            <a href="http://demos.creative-tim.com/material-kit/docs/2.0/getting-started/introduction.html" class="dropdown-item">
                                <i class="material-icons">content_paste</i> Documentation
                            </a>
                        </div>
                    </li> -->
                   <!--  <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
                            <i class="material-icons">cloud_download</i> Download
                        </a>
                    </li> -->
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="material-icons">share</i> Social
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                        <a class="dropdown-item">
                            <i class="fa fa-twitter"></i> Follow us on Twitter
                        </a>
                        <a class="dropdown-item"  >
                            <i class="fa fa-facebook-square"></i> Like us on Facebook
                        </a>
                        <a class="dropdown-item">
                            <i class="fa fa-instagram"></i> Follow us on Instagram
                        </a>
                        </div>
                    </li>  
                    <?php IF( !isset($_SESSION['id'] )): ?>
                    <li class="button-container nav-item iframe-extern">
                        <a data-target="#loginModal" data-toggle="modal" target="_blank" class="btn  btn-default brown darken-3 white-text btn-round btn-block">
                            Login / Signup
                        <div class="ripple-container"></div></a>
                    </li>
                        
                    <?php ELSE: ?>
                     <li class="dropdown nav-item">
                        <a href="#pablo" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                            <div class="profile-photo-small">
                                <img src="uploads/users/profile_img/<?=userInfo("profile_img",$_SESSION['id'])?>" alt="Circle Image" class="rounded-circle img-fluid">
                            </div>
                        <div class="ripple-container"></div></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <h6 class="dropdown-header">Dropdown header</h6>
                            <a href="account.php" class="dropdown-item">Profile</a>
                            <a href="account.php?settings" class="dropdown-item">Settings and other stuff</a>
                            <a href="logout.php" class="dropdown-item">Sign out</a>
                        </div>
                    </li> 

                    <?php IF ($_SESSION['role'] == 0):?>
                        <li class="nav-item brown darken-3">
                        <a class="nav-link" href="admin/">
                            <i class="material-icons">security</i> Admin
                        </a>
                        </li>
                        <?php ENDIF; ?>     
                    <?php ENDIF; ?>                            
                </ul>
            </div>
        </div>
    </nav>
     <div class="">
        <div id="elm-taxonomy-menu-5" class="elm-taxonomy-menu d-none d-sm-block">
            <div id="elm-taxonomy-menu-5-container" class="taxonomy-menu-container">               
                <div class="sidebar-background" style="background-image: url(./assets/img/sidebar-1.jpg);opacity: 0.23;"></div>
                <div class="tax-menu-heading">
            <a href="#" class="tax-menu-heading-icon"><i class="fa fa-sliders"></i></a>
            <a href="#" class="tax-menu-close"><i class="fa fa-times"></i></a>
            <div class="tax-menu-item-data">
                <span class="tax-item-title">Locations</span>
            </div>
        </div>
                <div class="optiscroll">
                    <div class="optiscroll-content dragscroll">
                        <ul class="tax-menu">
                            <li class="tax-menu-item">
                                <a href="http://catchfood.net/loc/agargaon/">
                                    <div class="icon">
                                        <span class="icon-letter">A</span>
                                    </div>
                                </a>
                                <div class="tax-menu-item-data">
                                    <a href="http://catchfood.net/loc/agargaon/">
                                        <span class="tax-item-title">Agargaon</span>
                                    </a>


                                    <div class="tax-item-count">
                                         <span>1</span>
                                    </div>
                                </div>
                            </li>


                            <li class="tax-menu-item">
                                <a href="http://catchfood.net/loc/baily-road/">
                                    <div class="icon">
                                        <span class="icon-letter">B</span>
                                    </div>
                                </a>
                                <div class="tax-menu-item-data">
                                    <a href="http://catchfood.net/loc/baily-road/">
                                        <span class="tax-item-title">Baily Road</span>
                                    </a>


                                    <div class="tax-item-count">
                                         <span>8</span>
                                    </div>
                                </div>
                            </li>


                            <li class="tax-menu-item">
                                <a href="http://catchfood.net/loc/banani/">
                                    <div class="icon">
                                        <span class="icon-letter">B</span>
                                    </div>
                                </a>
                                <div class="tax-menu-item-data">
                                    <a href="http://catchfood.net/loc/banani/">
                                        <span class="tax-item-title">Banani</span>
                                    </a>


                                    <div class="tax-item-count">
                                         <span>21</span>
                                    </div>
                                </div>
                            </li>


                            <li class="tax-menu-item">
                                <a href="http://catchfood.net/loc/bashundhara/">
                                    <div class="icon">
                                        <span class="icon-letter">B</span>
                                    </div>
                                </a>
                                <div class="tax-menu-item-data">
                                    <a href="http://catchfood.net/loc/bashundhara/">
                                        <span class="tax-item-title">Bashundhara</span>
                                    </a>


                                    <div class="tax-item-count">
                                         <span>17</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
   </div>
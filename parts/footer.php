<div class="spacing-80">
</div>
<div class="subscribe-line subscribe-line-image" style="background-image: url('assets/img/kit/pro/bg7.jpg');">
   <section class="section section-basic">
      <div class="container">
         <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
               <div class="text-center">
                  <h3 class="title">Start Promoting Your Business With Us</h3>
                  <p class="description">
                     Join our newsletter and get news in your inbox every week! We hate spam too, so no worries about this.
                  </p>
               </div>
               <a href="#pablo" class="btn btn-twitter btn-round">
               <i class="fa fa-twitter"></i> Twitter · 2.5k
               </a>
               <a href="#pablo" class="btn btn-facebook btn-round">
                  <i class="fa fa-facebook-square"></i> Facebook · 3.2k
                  <div class="ripple-container"></div>
               </a>
               <a href="#pablo" class="btn btn-google btn-round">
                  <i class="fa fa-google-plus"></i> Google · 1.2k
                  <div class="ripple-container"></div>
               </a>
            </div>
         </div>
      </div>
   </section>
</div>
<footer class="footer footer-black">
   <div class="container">
      <a class="footer-brand" href="#pablo">Material Kit PRO</a>
      <ul class="pull-center">
         <li>
            <a href="#pablo">
            Blog
            </a>
         </li>
         <li>
            <a href="#pablo">
            Presentation
            </a>
         </li>
         <li>
            <a href="#pablo">
            Discover
            </a>
         </li>
         <li>
            <a href="#pablo">
            Payment
            </a>
         </li>
         <li>
            <a href="#pablo">
            Contact Us
            </a>
         </li>
      </ul>
      <ul class="social-buttons float-right">
         <li>
            <a href="https://twitter.com/CreativeTim" target="_blank" class="btn btn-just-icon btn-link">
            <i class="fa fa-twitter"></i>
            </a>
         </li>
         <li>
            <a href="https://www.facebook.com/CreativeTim" target="_blank" class="btn btn-just-icon btn-link">
            <i class="fa fa-facebook-square"></i>
            </a>
         </li>
         <li>
            <a href="https://www.instagram.com/CreativeTimOfficial" target="_blank" class="btn btn-just-icon btn-link">
            <i class="fa fa-instagram"></i>
            </a>
         </li>
      </ul>
   </div>
</footer>

<?php IF( !isset($_SESSION['id'] )): ?>
<!-- Login Modal -->
<?php include_once 'processors/parseLogin.php'; ?>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-login" role="document">
      <div class="modal-content">
         <div class="card card-signup card-plain">
            <div class="modal-header">
               <div class="card-header brown-grad text-center">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                  <h4 class="card-title white-text">Log in</h4>                  
               </div>
            </div>
            <form class="form" method="post" action="">
            <div class="modal-body">
                <div class="social-line">
                    <a href="<?= $_GLOBALS['fb_login_url'];?>" class="btn btn-facebook btn-round">
                        <i class="fa fa-facebook-square"></i> Login With Facebook
                        <div class="ripple-container"></div>
                    </a>
                     
                  </div>
               
                  <p class="description text-center">Or Be Classical</p>
                  <div class="card-body">                     
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i class="material-icons">mail</i>
                              </span>
                           </div>
                           <input type="text" class="form-control" placeholder="Email or Username..." name="emailusername" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i class="material-icons">lock_outline</i>
                              </span>
                           </div>
                           <input type="password" placeholder="Password..." class="form-control" name="password" required />
                        </div>
                     </div>
                     <a href="javascript:void(0);" class="description text-center ml-auto mr-auto" data-toggle="modal" data-target="#forgotPwdModal" data-dismiss="modal">Forgot Password?</a>
                  </div>
               
            </div>
            <div class="modal-footer justify-content-center">
               <button type="submit" class="btn btn-primary btn-wd btn-lg white-text brown darken-3" name="loginBtn">Login</button>
               <a  class="btn btn-info btn-wd btn-lg white-text brown darken-3" data-toggle="modal" data-dismiss="modal" data-target="#signupModal">Sign Up</a>
            </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!--  End Modal -->
<!-- Register Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-signup" role="document">
      <div class="modal-content">
         <div class="card card-signup card-plain">
            <div class="modal-header">
               <h5 class="modal-title card-title">Register</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <i class="material-icons">clear</i>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-5 ml-auto">
                     <div class="info info-horizontal">
                        <div class="icon icon-rose">
                           <i class="material-icons">timeline</i>
                        </div>
                        <div class="description">
                           <h4 class="info-title">Marketing</h4>
                           <p class="description">
                              We've created the marketing campaign of the website. It was a very interesting collaboration.
                           </p>
                        </div>
                     </div>
                     <div class="info info-horizontal">
                        <div class="icon icon-primary">
                           <i class="material-icons">code</i>
                        </div>
                        <div class="description">
                           <h4 class="info-title">Fully Coded in HTML5</h4>
                           <p class="description">
                              We've developed the website with HTML5 and CSS3. The client has access to the code using GitHub.
                           </p>
                        </div>
                     </div>
                     <div class="info info-horizontal">
                        <div class="icon icon-info">
                           <i class="material-icons">group</i>
                        </div>
                        <div class="description">
                           <h4 class="info-title">Built Audience</h4>
                           <p class="description">
                              There is also a Fully Customizable CMS Admin Dashboard for this product.
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 mr-auto">
                     <div class="social text-center">  

                        <a href="<?= $_GLOBALS['fb_login_url'];?>" class="btn btn-just-icon btn-round btn-facebook" rel="tooltip" data-placement="bottom" title="" data-original-title="Signup With FB">
                        <i class="fa fa-facebook"> </i>
                        </a>
                        <h4> or be classical </h4>
                     </div>
                    <?php include_once 'parts/forms/user-signup.php'; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--  End Modal -->

<!-- Password Reset Modal -->
<?php include_once 'processors/parseForgotPass.php'; ?>
<div class="modal fade" id="forgotPwdModal" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-login" role="document">
      <div class="modal-content">
         <div class="card card-signup card-plain">
            <div class="modal-header">
               <div class="card-header brown-grad text-center">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                  <h4 class="card-title white-text">Reset Password</h4>                  
               </div>
            </div>
            <?php include_once 'parts/forms/reset-pass-email-box.php'; ?>
         </div>
      </div>
   </div>
</div>

  <?php IF(isset($_GET['token'])): ?>
<!-- TOKEN SUPPLIED MODAL -->
<div class="modal fade" id="forgotPwdTokenModal" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-login" role="document">
      <div class="modal-content">
         <div class="card card-signup card-plain">
            <div class="modal-header">
               <div class="card-header brown-grad text-center">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                  <h4 class="card-title white-text">Reset Password</h4>                  
               </div>
            </div>
            <?php include_once 'parts/forms/reset-pass-confirm-box.php'; ?>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
  //Show Modal
  $(function(){
    $('#forgotPwdTokenModal').modal('show');
  });
</script>
<!-- END TOKEN SUPPLIED MODAL -->
  <?php ENDIF; ?>
<?php ENDIF; ?>

<!--   Core JS Files   -->
<script src="./assets/js/core/popper.min.js"></script>
<script src="./assets/js/bootstrap-material-design.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
<script src="./assets/js/plugins/moment.min.js"></script>
<!--    Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="./assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--    Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="./assets/js/plugins/nouislider.min.js"></script>
<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="./assets/js/plugins/bootstrap-selectpicker.js"></script>
<!--    Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
<script src="./assets/js/plugins/bootstrap-tagsinput.js"></script>
<!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="./assets/js/plugins/jasny-bootstrap.min.js"></script>
<!--   Plugin for Small Gallery in Product Page -->
<script src="./assets/js/plugins/jquery.flexisel.js"></script>
<script src="./assets/js/material-kit.min.js"></script>
<!-- Fixed Sidebar Nav - js With initialisations For Demo Purpose, Don't Include it in your project -->
<script src="./assets/assets-for-demo/js/material-kit-demo.js"></script>  
<script src="./assets/js/jquery.magnific-popup.min.js"></script>  
<script src="./assets/js/jquery.barrating.min.js"></script>   
<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>
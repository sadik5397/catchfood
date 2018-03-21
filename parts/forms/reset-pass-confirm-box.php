<form class="form" method="post" id="forgotPwdTokenForm" action="" data-toggle="validator">
<div class="modal-body">                  
      <div class="card-body">                     
         <div class="form-group">
            <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text">
                  <i class="material-icons">lock_open</i>
                  </span>
               </div>
               <input type="password" data-minlength="6" class="form-control" id="pwd" placeholder="Password" required name="password">
              <div class="help-block"></div>
            </div>
         </div>    
         <div class="form-group">
            <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text">
                  <i class="material-icons">lock_outline</i>
                  </span>
               </div>
                <input type="password" class="form-control" id="PwdConfirm" data-match="#pwd" data-match-error="Whoops, these don't match" placeholder="Confirm Password" required>
                 <div class="help-block with-errors"></div>
            </div>
         </div>                   
      </div>
   
</div>
<input type="hidden" name="email" value="<?= base64_decode($_GET['email']);?>">
<input type="hidden" name="token" value="<?= $_GET['token']?>">
<div class="modal-footer justify-content-center">
   <button type="submit" class="btn btn-default btn-wd btn-lg white-text brown darken-3" name="forgotPassChngBtn">Reset Password</button>               
</div>
<div class="spacing-80"></div>
</form>
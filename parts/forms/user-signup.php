 <form class="form" method="post" action="processors/parseSignup.php" id="signupForm" data-toggle="validator">
                        <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="material-icons">faces</i>
                                  </span>
                                </div>
                                <input type="text" class="form-control" placeholder="First Name" name="fname">
                              </div>                              
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">                                
                                <input type="text" class="form-control" placeholder="Last Name" name="lname">
                              </div>                              
                            </div>
                          </div>    
                          <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="material-icons">group</i>
                                  </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" name="username">
                              </div>                              
                            </div>                            
                          </div>    
                          <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="material-icons">email</i>
                                  </span>
                                </div>
                                <input type="email" class="form-control" placeholder="Email" name="email">
                              </div>                              
                            </div>                            
                          </div>    
                          <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="material-icons">lock_outline</i>
                                  </span>
                                </div>
                                <input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required name="password">
                                <div class="help-block"></div>
                              </div>                              
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="material-icons">lock_outline</i>
                                  </span>
                                </div>
                                <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm Password" required>
                                <div class="help-block with-errors"></div>
                              </div>                              
                            </div>
                            
                          </div>     
                          <div class="form-check form-check-radio no-padding-forced">
                              <label class="form-check-label">
                                  <input class="form-check-input" type="radio" name="gender" value="male" checked>
                                  I am a Male
                                  <span class="circle">
                                      <span class="check"></span>
                                  </span>
                              </label>
                          </div>
                          <div class="form-check form-check-radio no-padding-forced">
                              <label class="form-check-label">
                                  <input class="form-check-input" type="radio" name="gender" value="female">
                                  I am a Female
                                  <span class="circle">
                                      <span class="check"></span>
                                  </span>
                              </label>
                          </div>                   
                           <div class="form-check">
                              <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" checked required>
                              <span class="form-check-sign">
                              <span class="check"></span>
                              </span>
                              I agree to the
                              <a href="#something">terms and conditions</a>.
                              </label>
                           </div>
                        </div>
                        <input type="hidden" name="source" value="web">
                        <div class="modal-footer justify-content-center">
                           <button type="submit" class="btn brown darken-3 white-text btn-round">Get Started</button>
                        </div>
                     </form>                    
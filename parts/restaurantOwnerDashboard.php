<?php 
  include_once 'processors/parseDashboardData.php'; 
?>    
            <div class="row">                                
                <!-- DATA UPDATE -->
                <div class="col-md-6">   
                    <div class="row">
                        <div class="col-12">
                            <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                 <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title">Data Update</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Type In the Updates that may need to be done in the following form</h6>
                                    <div class="form-group label-floating bmd-form-group">
                                        <label class="form-control-label bmd-label-floating"> Subject for DATA UPDATE...</label>
                                        <input type="text" class="form-control" name="data_update_subject">
                                    </div>
                                    <div class="form-group">                                            
                                        <textarea class="wysig form-control" rows="5" name="data_update_body">
                                          TYPE DATA UPDATE DETAILS HERE
                                        </textarea>
                                    </div>
                                    <div class="form-group form-file-upload form-file-multiple bmd-form-group">
                                        <input type="file" multiple class="inputFileHidden" name="data_update_files[]">
                                        <div class="input-group">
                                            <input type="text" class="form-control inputFileVisible" placeholder="Attach Files for data update" multiple>
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-fab btn-round btn-info">
                                                    <i class="material-icons">layers</i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="card-footer">                                        
                                    <button class="btn btn-primary btn-round card-link" type="submit" name="update_data_submit">Submit Data Updates</button>
                                  </div>
                                </div>                    
                            </form> 
                        </div>
                    </div>                     
                     <div class="row">
                        <div class="col-md-12 ml-auto mr-auto">
                           <?php printDashBoardData(1,$_SESSION['id'],2); ?>
                        </div>
                                                    
                    </div>  
                     <div class="spacing-80"></div>                    
                </div>


                <!-- OFFER UPDATE -->
                  <div class="col-md-6">   
                    <div class="row">
                        <div class="col-12">
                            <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                 <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title">OFFER Update</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Type In the Updates that may need to be done in the following form</h6>
                                    <div class="form-group label-floating bmd-form-group">
                                        <label class="form-control-label bmd-label-floating"> Subject for OFFER UPDATE...</label>
                                        <input type="text" class="form-control" name="offer_update_subject">
                                    </div>
                                    <div class="form-group">                                            
                                        <textarea class="wysig form-control" rows="5" name="offer_update_body"></textarea>
                                    </div>
                                    <div class="form-group form-file-upload form-file-multiple bmd-form-group">
                                        <input type="file" multiple class="inputFileHidden" name="offer_update_files[]">
                                        <div class="input-group">
                                            <input type="text" class="form-control inputFileVisible" placeholder="Attach Files" multiple>
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-fab btn-round btn-info">
                                                    <i class="material-icons">layers</i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="card-footer">                                        
                                    <button class="btn btn-primary btn-round card-link" type="submit" name="update_offer_submit">Submit Offer Updates</button>
                                  </div>
                                </div>                    
                            </form> 
                        </div>
                    </div>                     
                     <div class="row">
                        <div class="col-md-12 ml-auto mr-auto">
                           <?php printDashBoardData(2,$_SESSION['id'],2); ?>
                        </div>
                                                    
                    </div>  
                     <div class="spacing-80"></div>                    
                </div>

            </div>
       

<!-- SEND MESSAGE TO EDITOR -->
<div class="modal fade bd-example-modal-lg" id="sendEditorMsg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 10">
  <div class="modal-dialog modal-lg">
<form action="" method="get" accept-charset="utf-8" id="sendMsgtoEditor">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Send Message To Editor</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
                <div class="input-group">                                
                <textarea class="form-control" name="msg" placeholder="Type Your Message Here"></textarea>
              </div>                              
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out"></div></div></button>
        <button type="submit" class="btn btn-primary">Send Message<div class="ripple-container"></div></button>
    </div>
    </div>
</form>
  </div>
</div>
<!-- SEND MESSAGE TO EDITOR -->
<div class="row">
<div class="col s12">
<div class="row" id="menu-items-wrap">
	<div class="row">

    <div class="input-field col s4">
      <input type="text" class="validate" required name="item_name[]">
      <label>Item Name</label>
    </div>
    <div class="input-field col s2">
      <input type="text" class="validate" required name="item_price[]">
      <label>Item Price</label>
    </div>
     <div class="input-field col s3">
              <select required name="item_type_id[]">
                <option value="" disabled selected>Choose your option</option>
                <?php printRestaurantOption($db,'item_types','item_type_id','item_type_name') ?>                
              </select>
              <label>Item Type</label>
            </div>


    </div>

    <div class="row">

    	<div class="input-field col s4">
      <input type="text" class="validate" name="item_name[]">
      <label>Item Name</label>
    </div>
    <div class="input-field col s2">
      <input type="text" class="validate" name="item_price[]">
      <label>Item Price</label>
    </div>
     <div class="input-field col s3">
              <select name="item_type_id[]">
                <option value="" disabled selected>Choose your option</option>
                <?php printRestaurantOption($db,'item_types','item_type_id','item_type_name') ?>                
              </select>
              <label>Item Type</label>
            </div>


    <p> <i class="material-icons red white-text delete">clear</i> </p>


  	</div>



</div>
</div>
</div>
<div class="row">
<a href="#!" id="add-more" class="center-align waves-effect waves-light btn wow bounceIn">ADD MORE</a>	
</div>

<script>
	$(function(){
     var prepareHtml = function(){
     	var latestNum = parseInt($('.count').last().text());
     	var HTML = ($('#menu-items-wrap').children('.row').last()[0]).outerHTML;

  	return HTML;
     }
     $('body').on('click', '#add-more', function(event) {
     	event.preventDefault();
     	$('#menu-items-wrap').append(prepareHtml());
      $('select').material_select();
     });


     $('body').on('click', '.delete', function(event) {
     	event.preventDefault();
      
     	$(this).closest('.row').fadeOut('fast', function() {
     		$(this).remove();
     	});;
      $('select').material_select();
     });
	});
</script>
<div class="row">
<div class="col s12">

<div class="row" id="contact-url-wrap">
	<div class="row">



    <div class="input-field col s4">
      <input type="text" class="validate" placeholder="eg. FACEBOOK, PHONE,EMAIL" required name="contact_type[]">
      <label>CONTACT TYPE</label>
    </div>
    <div class="input-field col s7">
      <input type="text" class="validate" required name="contact_info[]">
      <label>INFO</label>
    </div>   



    </div>

    <div class="row">
    	<div class="input-field col s4">
      <input type="text" class="validate" placeholder="eg. FACEBOOK, PHONE,EMAIL" required name="contact_type[]">
      <label>CONTACT TYPE</label>
    </div>
    <div class="input-field col s7">
      <input type="text" class="validate" required name="contact_info[]">
      <label>INFO</label>
    </div>   
    <p> <i class="material-icons red white-text delete">clear</i> </p>
  	</div>
</div>
<div class="row"> 
<a href="#!" id="add-more-url" class="center-align waves-effect waves-light btn wow bounceIn">ADD MORE</a>  
</div>

<div class="row">
                
                <div class="input-field col s12">
              <select name="area_id">
                <option value="">Choose One</option>
                <?php printRestaurantOption($db,'areas','area_id','area_name'); ?>
              </select>
              <label>Restaurant Area</label>
            </div>
              </div>
              <div class="row">
                
                <div class="input-field col s4">
      <input type="text" class="validate" placeholder="eg. 23.08 | 36.5" name="restaurant_gps">
      <label>GPS Position("|" is required)</label>
    </div>
              </div>

            </div>

</div>


<script>
	$(function(){
     
     $('body').on('click', '#add-more-url', function(event) {
     	event.preventDefault();
      var HTML = ($('#contact-url-wrap').children('.row').last()[0]).outerHTML;
     	$('#contact-url-wrap').append(HTML);
     });
     // $('body').on('click', '#add-more-email', function(event) {
     //  event.preventDefault();
     //  var HTML = ($('#contact-email-wrap').children('.row').last()[0]).outerHTML;
     //  $('#contact-email-wrap').append(HTML);
     // });
     // $('body').on('click', '#add-more-phone', function(event) {
     //  event.preventDefault();
     //  var HTML = ($('#contact-phone-wrap').children('.row').last()[0]).outerHTML;
     //  $('#contact-phone-wrap').append(HTML);
     // });

     $('body').on('click', '.delete', function(event) {
     	event.preventDefault();
     	$(this).closest('.row').fadeOut('fast', function() {
     		$(this).remove();
     	});;
     });
	});
</script>
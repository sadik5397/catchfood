<div class="row">
		      <div class="col m12">
				      <div class="row">
				        <div class="input-field col s12">
				          <input type="text" class="validate" required name="author">
				          <label>Submitted By</label>
				        </div>
				        <div class="input-field col s12">
				          <input type="text" class="validate" required name="restaurant_name">
				          <label>Restaurant Name</label>
				        </div>
				      </div>
				      <div class="row">
				        <div class="input-field col s12">
				          <textarea class="materialize-textarea" required name="restaurant_address"></textarea>
				          <label >Full Address</label>
				        </div>
				      </div>
				      <div class="row">
				      	<p> Restaurant Type</p>
				      	<?php printRestaurantTypeChecks($db) ?>
				      		        	
	      		      </div>	
	      		    <div class="row">
	      		      	
	      		      
	      		      <div class="input-field col s12">
				          <input type="text" class="validate" required name="restaurant_best">
				          <label>Best/Popular Item of this Restaurant</label>
			          </div>	      
			      	</div>
			      	<div class="row">
			      		<div class="file-field input-field">
					      <div class="btn">
					        <span>Feature Photo</span>
					        <input type="file" name="restaurant_image" accept="image/*" required>
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate" type="text" placeholder="Feature Photo / Main Photo" required>
					      </div>
					    </div>
			      	</div>
			      	<div class="row">
			      		<div class="file-field input-field">
					      <div class="btn">
					        <span>Logo</span>
					        <input type="file" required name="restaurant_logo" accept="image/*">
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate" type="text" placeholder="Logo" required>
					      </div>
					    </div>
			      	</div>
			      	<div class="row">
			      		<p >Long Description</p>
				        <div class="input-field col s12">
				          <textarea class="materialize-textarea wysig" name="restaurant_details"></textarea>
				          
				        </div>
				      </div>		
				      <div class="row">
			      		
				        <div class="input-field col s12">
					    <select multiple name="feature_id[]">
					      <option value="" disabled selected>Choose your option</option>
					      <?php printRestaurantOption($db,'features','feature_id','feature_name'); ?>					      
					    </select>
					    <label>Available Features</label>
					  </div>
				      </div>		  
		      </div>
		    </div>
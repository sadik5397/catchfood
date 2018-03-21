<?php 
if (isset($_POST['addbtn'])) {
	//Directories For uploading images and files
	$upload_dir['restaurant_logo'] = "uploads/logos";
	$upload_dir['restaurant_image'] = "uploads/covers";
	$upload_dir['extra_file'] = "uploads/extras";

	$restaurant_image = time().$_FILES["restaurant_image"]["name"];
	$restaurant_logo = time().$_FILES['restaurant_logo'];


	$restaurant_image_target = $upload_dir['restaurant_image'].$restaurant_image;
	$restaurant_logo_target = $upload_dir['restaurant_logo'].$restaurant_logo;
	//UPLOAD THE logo and featured Image
    if (move_uploaded_file($_FILES["restaurant_image"]["tmp_name"], $restaurant_image_target) && move_uploaded_file($_FILES["restaurant_logo"]["tmp_name"], $restaurant_logo_target)) {
       //Successfully uploaded The images
       //insert the restaurant INFO
       $sql = "INSERT INTO `restaurants` ( `restaurant_name`, `author`, `restaurant_address`, `restaurant_gps`, `restaurant_best`, `restaurant_logo`, `restaurant_image`, `restaurant_details`, `sat`, `sun`, `mon`, `tue`, `wed`, `thu`, `fri`) VALUES (:restaurant_name, :author, :restaurant_address, :restaurant_gps, :restaurant_best, :restaurant_logo, :restaurant_image, :restaurant_details, :sat, :sun, :mon, :tue, :wed, :thu, :fri)";
       $statement= $db->prepare($sql);
       $statement->execute(array(
       					':restaurant_name' => $_POST['restaurant_name'], 
						':author' => $_POST['author'], 
						':restaurant_address' => $_POST['restaurant_address'], 
						':restaurant_gps' => $_POST['restaurant_gps'], 
						':restaurant_best' => $_POST['restaurant_best'], 
						':restaurant_logo' => $restaurant_logo, 
						':restaurant_image' => $restaurant_image, 
						':restaurant_details' => $_POST['restaurant_details'], 
						':sat' => $_POST['sat'], 
						':sun' => $_POST['sun'], 
						':mon' => $_POST['mon'], 
						':tue' => $_POST['tue'], 
						':wed' => $_POST['wed'], 
						':thu' => $_POST['thu'], 
						':fri' => $_POST['fri']
						));
       $restaurant_id = $db->lastInsertId();
       if ($statement->rowCount() == 1) { //If the adding was successful
       	//upload the Menu
       	foreach ($_POST['item_name'] as $index => $item_name) {
       		if ($item_name != '') { //If the item name really exists
       			$item_price = $_POST['item_price'][$index];
       			$item_type_id = (isset($_POST['item_type_id'][$index])) ? $_POST['item_type_id'][$index] : '';
       			try {
       				$sql = "INSERT INTO `items` (`item_name`, `item_price`, `item_type_id`, `restaurant_id`) VALUES (:item_name, :item_price, :item_type_id, :restaurant_id)";
       				$statement= $db->prepare($sql);
	       			$statement->execute(array(':item_name' => $item_name, ':item_price' => $item_price, ':item_type_id'=>$item_type_id, ':restaurant_id' => $restaurant_id));	
       			} catch (PDOException $e) {
       				$console =new jsConsole();
       				$console->log($e->getMessage());
       			}
       			
       		}
       	}

       	//Upload Features
       	foreach ($_POST['feature_id'] as $index => $feature_id) {       				
       			try {
       				$sql = "INSERT INTO `tbl_restaurants_features` (`restaurant_id`, `feature_id`) VALUES (:restaurant_id, :feature_id)";
       				$statement= $db->prepare($sql);
	       			$statement->execute(array(':restaurant_id' =>$restaurant_id, ':feature_id' => $feature_id));	
       			} catch (PDOException $e) {
       				$console =new jsConsole();
       				$console->log($e->getMessage());
       			}
       	}
       	
       	//Upload Contact Info
       	foreach ($_POST['contact_type'] as $index => $contact_type) {
       		if ($contact_type != '') { //If the Contact Type really exists       			
       			$contact_info = $_POST['contact_info'][$index];
       			try {
       				$sql = "INSERT INTO `contacts` (`contact_type`, `contact_info`, `restaurant_id`) VALUES (:contact_type, :contact_info, :restaurant_id)";
       				$statement= $db->prepare($sql);
	       			$statement->execute(array(':contact_type' => $contact_type, ':contact_info' => $contact_info, ':restaurant_id' => $restaurant_id));	
       			} catch (PDOException $e) {
       				$console =new jsConsole();
       				$console->log($e->getMessage());
       			}
       			
       		}
       	}

       	//Upload restaurant Types
       	foreach ($_POST['restaurant_type_id'] as $index => $restaurant_type_id) {
       			try {
       				$sql = "INSERT INTO `tbl_restaurants_restaurant_types` (`restaurant_id`, `restaurant_type_id`) VALUES (:restaurant_id, :restaurant_type_id)";
       				$statement= $db->prepare($sql);
	       			$statement->execute(array(':restaurant_id' => $restaurant_id, ':restaurant_type_id' => $restaurant_type_id));	
       			} catch (PDOException $e) {
       				$console =new jsConsole();
       				$console->log($e->getMessage());
       			}
       	}

       	//Upload Area
       	try {
       		$area_id = $_POST['area_id'];
       		$sql = "INSERT INTO `tbl_restaurants_areas` (`restaurant_id`, `area_id`) VALUES (:restaurant_id, :area_id)";
       		$statement=$db->prepare($sql);
       		$statement->execute(array(':restaurant_id' => $restaurant_id ,':area_id' => $area_id ));
       	} catch (PDOException $e) {
       		$console =new jsConsole();
			$console->log($e->getMessage());
       	}

       		//UPLOAD EXTRAS
       		if(count($_FILES["extra_file"]['name'])>0){ //check if any file uploaded	
       		$console =new jsConsole();		 
			  for($j=0; $j < count($_FILES["extra_file"]['name']); $j++){ //loop the uploaded file array
			   $filen = time().$_FILES["item_file"]['name']["$j"]; //file name
			   $path = $upload_dir['extra_file'].$filen; //generate the destination path
			   if(move_uploaded_file($_FILES["item_file"]['tmp_name']["$j"],$path)){
			   		$console->log("File# ".($j+1)." ($filen) uploaded successfully");
			   		//ADD records to database
			   		try {
			   			$sql = "INSERT INTO `extras` (`extra_file`, `restaurant_id`) VALUES (:extra_file, :restaurant_id)";
			   			$statement=$db->prepare($sql);
			   			$statement->execute(array(':extra_file'=>$filen , ':restaurant_id' =>$restaurant_id));
			   		} catch (PDOException $e) {
			   			$console =new jsConsole();		 
			   			$console->log($e->getMessage());
			   		}
			   		
			   }
			  }
			 }



     }   


    } else {
        echo "Sorry, there was an error uploading your file.";
    }



	
}

?>
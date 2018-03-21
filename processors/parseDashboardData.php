<?php  
//if data update requested
if (isset($_POST['update_data_submit'])) { //
	$database = new db();
	$db = $database->connect();
	//collect all data
	$subject = $_POST['data_update_subject'];
	$msg_body = $_POST['data_update_body'];
	$user_id = $_SESSION['id'];
	$form_errors = array();
	//DIR for uploading attachments
	$upload_dir["data_update_files"] = "uploads/attachments/";

	//Upload data to database
	try {
		//prepare for the add to database
		$statement = $db->prepare("INSERT INTO `dashboard_updates` (`user_id`, `subject`, `msg_body`, `data_type`) VALUES (:user_id,:subject,:msg_body,:data_type)");
		//add to database
		$statement->execute(array(
			':user_id' => $user_id,
			':subject' => $subject,
			':msg_body' => $msg_body,
			':data_type' => 1
		));
		$data_id=$db->lastInsertId();
		if ($statement->rowCount() == 1) { //if the adding was successful
			//UPLOAD attachments
			if(count($_FILES["data_update_files"]['name'])>0){ //check if any file uploaded	
				$console =new jsConsole();		 
				for($j=0; $j < count($_FILES["data_update_files"]['name']); $j++){ //loop the uploaded file array
					$filen = time().$_FILES["data_update_files"]['name']["$j"]; //file name
					$path = $upload_dir["data_update_files"].$filen; //generate the destination path
					if(move_uploaded_file($_FILES["data_update_files"]['tmp_name']["$j"],$path)){
							$console->log("File# ".($j+1)." ($filen) uploaded successfully");
							//ADD records to database
							try {
								$sql = "INSERT INTO `dashboard_updates_attchments` (`file_name`, `user_id`, `data_id`) VALUES (:file_name, :user_id, :data_id)";
								$statement=$db->prepare($sql);
								$statement->execute(array(':file_name'=>$filen , ':data_id' =>$data_id, ':user_id' => $user_id));
								if ($statement->rowCount() >= 1 ) {// database update successful
									$console->log("File# ".($j+1)." ($filen) added to db successfully");
								}else{
									array_push($form_errors, "File# ".($j+1)." ($filen) Could Not be added to db");						
								}
							} catch (PDOException $e) {
								$console =new jsConsole();		 
								$console->log($e->getMessage());
							}
							
					}else{
						array_push($form_errors, "File# ".($j+1)." ($filen) Could Not be Uploaded");						
					}
				}
			}
		}else{
			array_push($form_errors, 'Error Adding data to the database');
		}
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	if (sizeof($form_errors) == 0) { // No errors
	    swal('Yaay!','Data Update has been submitted','success','account.php');
	   }else{
	    $html = "<ul>";
	    foreach ($form_errors as $err) {
	        $html .= "<li>".$err."</li>";
	    }
	    $html .= "<ul>";
	    ?>
	<script type="text/javascript">
	    $(function(){
	    swal({
	          title: 'ERROR!',
	          type: 'error',
	          html: '<?=$html?>',          
	          showCancelButton: false                   
	        }).then((result) => {
	            window.location.href="account.php";
	        });
	    });
	</script>
	    <?php
	}

	
}




//if offer update requested
if (isset($_POST['update_offer_submit'])) { //
	$database = new db();
	$db = $database->connect();
	//collect all data
	$subject = $_POST['offer_update_subject'];
	$msg_body = $_POST['offer_update_body'];
	$user_id = $_SESSION['id'];
	$form_errors = array();
	//DIR for uploading attachments
	$upload_dir["offer_update_files"] = "uploads/attachments/";

	//Upload data to database
	try {
		//prepare for the add to database
		$statement = $db->prepare("INSERT INTO `dashboard_updates` (`user_id`, `subject`, `msg_body`, `data_type`) VALUES (:user_id,:subject,:msg_body,:data_type)");
		//add to database
		$statement->execute(array(
			':user_id' => $user_id,
			':subject' => $subject,
			':msg_body' => $msg_body,
			':data_type' => 2
		));
		$data_id=$db->lastInsertId();
		if ($statement->rowCount() == 1) { //if the adding was successful
			//UPLOAD attachments
			if(count($_FILES["offer_update_files"]['name'])>0){ //check if any file uploaded	
				$console =new jsConsole();		 
				for($j=0; $j < count($_FILES["offer_update_files"]['name']); $j++){ //loop the uploaded file array
					$filen = time().$_FILES["offer_update_files"]['name']["$j"]; //file name
					$path = $upload_dir["offer_update_files"].$filen; //generate the destination path
					if(move_uploaded_file($_FILES["offer_update_files"]['tmp_name']["$j"],$path)){
							$console->log("File# ".($j+1)." ($filen) uploaded successfully");
							//ADD records to database
							try {
								$sql = "INSERT INTO `dashboard_updates_attchments` (`file_name`, `user_id`, `data_id`) VALUES (:file_name, :user_id, :data_id)";
								$statement=$db->prepare($sql);
								$statement->execute(array(':file_name'=>$filen , ':data_id' =>$data_id, ':user_id' => $user_id));
								if ($statement->rowCount() >= 1 ) {// database update successful
									$console->log("File# ".($j+1)." ($filen) added to db successfully");
								}else{
									array_push($form_errors, "File# ".($j+1)." ($filen) Could Not be added to db");						
								}
							} catch (PDOException $e) {
								$console =new jsConsole();		 
								$console->log($e->getMessage());
							}
							
					}else{
						array_push($form_errors, "File# ".($j+1)." ($filen) Could Not be Uploaded");						
					}
				}
			}
		}else{
			array_push($form_errors, 'Error Adding data to the database');
		}
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	if (sizeof($form_errors) == 0) { // No errors
	    swal('Yaay!','OFFER Update has been submitted','success','account.php');
	   }else{
	    $html = "<ul>";
	    foreach ($form_errors as $err) {
	        $html .= "<li>".$err."</li>";
	    }
	    $html .= "<ul>";
	    ?>
	<script type="text/javascript">
	    $(function(){
	    swal({
	          title: 'ERROR!',
	          type: 'error',
	          html: '<?=$html?>',          
	          showCancelButton: false                   
	        }).then((result) => {
	            window.location.href="account.php";
	        });
	    });
	</script>
	    <?php
	}

	
}

?>
<?php
	$database = new db();
	$db = $database->connect();
	$console= new jsConsole();
	# Get the access token and catch the exceptions if any
	try {
	  $accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	# If the 
	if (isset($accessToken)) {
		$console->log("Login approved");
	  	// Logged in!
	 	// Now you can redirect to another page and use the
  		// access token from $_SESSION['facebook_access_token'] 
  		// But we shall we the same page

		// Sets the default fallback access token so 
		// we don't have to pass it to each request
		$fb->setDefaultAccessToken($accessToken);

		try {
		  $response = $fb->get('/me?fields=cover,name,email,first_name,last_name,gender');
		  $userNode = $response->getGraphUser();
		}catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}	
		$cover = json_decode($userNode->getProperty('cover'));


		//details
		$facebook_id = (string) $userNode->getId();
		$email = $userNode->getProperty('email');
		$fname = $userNode->getFirstName();
		$lname = $userNode->getLastName();
		$gender = $userNode->getGender();
		$username = $userNode->getId();
		
		$console->log("details Gathered");
		$console->log($facebook_id);
		//Pictures
		$profile_img_addr = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=400&height=400';
		$cover_img_addr = $cover->source;

		if (checkDuplicateEntries("users","facebook_id",$facebook_id,$db)) { //if the facebook user already exists in the database
			$console->log("Facebook account exists");
			//pull data from database
			$sql = "SELECT * FROM USERS WHERE facebook_id = :facebook_id";
			$statement = $db -> prepare($sql);
			$statement->execute([':facebook_id' => $facebook_id]);
			while ($row = $statement->fetch()) {

				//set the session and initiate login
			 	$_SESSION['id'] = $row['user_id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['fname'] =$row['fname'];
                $_SESSION['lname'] =$row['lname'];

                $fingerprint = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
                $_SESSION['last_active'] = time();
                $_SESSION['fingerprint'] = $fingerprint;
                //WELCOME
                swal("Welcome Back ".$fname, "You are Being logged in",'success','index.php',2000);
			}
			

		}else{ //if the facebook user does not exists in the database
			
			// check if the user already has an account on the site
			if (checkDuplicateEntries("users","email",$email,$db)) { //if The user already has an account with email
				$console->log("unintegrated facebook account detected");
				//add facebook to the user's account
				$statement = $db->prepare("UPDATE users SET facebook_id=:facebook_id WHERE email = :email");
				$statement->execute([':facebook_id'=>$facebook_id,":email"=>$email]);
				if ($statement->rowCount() > 0) { // if the intregation is successful
					$console->log($facebook_id);
					// Login the user
					$sql = "SELECT * FROM USERS WHERE email = :email";
					$statement = $db -> prepare($sql);
					$statement->execute([':email' => $email]);
					while ($row = $statement->fetch()) {
						//set the session and initiate login
					 	$_SESSION['id'] = $row['user_id'];
		                $_SESSION['email'] = $row['email'];
		                $_SESSION['role'] = $row['role'];
		                $_SESSION['fname'] =$row['fname'];
		                $_SESSION['lname'] =$row['lname'];

		                $fingerprint = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
		                $_SESSION['last_active'] = time();
		                $_SESSION['fingerprint'] = $fingerprint;
		                //WELCOME
		                swal("Welcome Back ".$fname, "You are Being logged in",'success','index.php',2000);
					}					
				}
			}else{ //IF the user has NO account whatsoever
				//SIGN UP THE USER
				$console->log("New user detected");
				//upload profile picture and cover picture
				$upload_dir['profile_img'] = "uploads/users/profile_img/";
				$upload_dir['cover_img'] = "uploads/users/cover_img/";				

				$profile_img = $facebook_id."-profile.jpg";
				$cover_img = $facebook_id."-cover.jpg";

				//DOWNLOAD The img files' data from facebook
				$profile_img_bin = file_get_contents($profile_img_addr);
				$cover_img_bin = file_get_contents($cover_img_addr);
				
				//UPLOAD THE logo and featured Image
			    if (file_put_contents($upload_dir['profile_img'].$profile_img,$profile_img_bin) && file_put_contents($upload_dir['cover_img'].$cover_img, $cover_img_bin)) { //if the upload is successfull

			    	//ADD THE USER
			    	$sql = "INSERT INTO `users` (`password`, `fname`, `lname`, `email`, `username`, `profile_img`, `cover_img`, `role`, `verified`, `address`, `phone_number`, `facebook_id`) VALUES (:password, :fname, :lname, :email, :username, :profile_img, :cover_img, :role, :verified, :address, :phone_number, :facebook_id)";
			    	$statement=$db->prepare($sql);
			    	$statement->execute(array(
			    		':password'=> password_hash("Hewh0tast3SaltSha11Di3", PASSWORD_DEFAULT),
			    		':fname'=> $fname,
			    		':lname'=>$lname,
			    		':email'=>$email,
			    		':username'=> $username,
			    		':profile_img'=> $profile_img,
			    		':cover_img'=> $cover_img,
			    		':role'=> '3',
			    		':verified'=> '1', 
			    		':address'=> '', 
			    		':phone_number'=> '', 
			    		':facebook_id'=> $facebook_id
			    	));
			    	$user_id=$db->lastInsertId();

			    	if ($statement->rowCount()) { //if the user adding is successfull
			    		//login the user
			    		$sql = "SELECT * FROM USERS WHERE user_id = :user_id";
						$statement = $db -> prepare($sql);
						$statement->execute([':user_id' => $user_id]);
						while ($row = $statement->fetch()) {
							//set the session and initiate login
						 	$_SESSION['id'] = $row['user_id'];
			                $_SESSION['email'] = $row['email'];
			                $_SESSION['role'] = $row['role'];
			                $_SESSION['fname'] =$row['fname'];
			                $_SESSION['lname'] =$row['lname'];

			                $fingerprint = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
			                $_SESSION['last_active'] = time();
			                $_SESSION['fingerprint'] = $fingerprint;
			                //WELCOME
			                swal("Welcome Back ".$fname, "You are Being logged in",'success','index.php',2000);
						}					    		
			    	}
			    	//SET COOKIES SO LOGOUT CAN BE PREVENTED
			    	rememberMe($_SESSION['id']);
			    }
			}

		}
	}else{		
		$_GLOBALS['fb_login_url'] = $loginUrl;
	}

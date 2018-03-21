<?php  
include_once 'resource/session.php';
include_once 'resource/utilities.php';

	$database = new db();
	$db = $database->connect();
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
		$facebook_id = $userNode->getId();
		$email = $userNode->getProperty('email');
		$fname = $userNode->getFirstName();
		$lname = $userNode->getLastName();
		$gender = $userNode->getGender();
		$username = $userNode->getId();
		
		//Pictures
		$profile_img_addr = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=400&height=400';
		$cover_img_addr = $cover->source;

		// if (checkDuplicateEntries("user","facebook_id",$userNode->getId(),$db)) { //if the facebook user already exists in the database

		// 	$sql = "SELECT * FROM USERS WHERE facebook_id";
		// }else{ //if the user does not exists in the database


		// }
		// Print the user Details
		echo "Welcome !<br><br>";		
		echo 'User ID: ' . $userNode->getId().'<br>';
		echo 'First Name: ' . $userNode->getFirstName().'<br>';
		echo 'Last Name: ' . $userNode->getLastName().'<br>';
		echo 'Gender: ' . $userNode->getGender().'<br>';		
		echo 'Email: ' . $userNode->getProperty('email').'<br><br>';

		$image = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=200';
		echo "Picture<br>";
		echo "<img src='$image' /><br><br>";
		
	}else{
		echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
	}

?>

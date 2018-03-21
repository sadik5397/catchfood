<?php
/* 
*Everything required for form validation is stored here
*This codes are function sonly. These are called from 
* another part of the applications
*/
// if((@include __DIR__.'/config.php') === false)
// {
//     header('location:./install');
// }


include_once __DIR__.'/config.php';
include_once __DIR__.'/plugin.php';

//PHP mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Checking Empty field, accepts an array for the data

function check_empty_fields($required_fields_array){ 
	//will contain form errors
	$form_errors = array();

	foreach ($required_fields_array as $field) {
        //if a field is empty or not set then
        if(!isset($_POST[$field]) || $_POST[$field] == null || $_POST == ''){
            //push it inside $form_errors
            $error = ''.$field.' is a required field';
            array_push($form_errors, $error);
        }
    }
	return $form_errors;
}

//checking the minimum legth, accepts an array. 
//['nameOfField' => minimumLegthInInteger]
// example : "username" => 4
function check_min_legth($fields_to_check_length){
	//errors
	$form_errors = array();
	foreach ($fields_to_check_length as $field => $minimumLegth) {
		//if trimmed string of the input is less than minimum legnth
		if(strlen(trim($_POST[$field])) < $minimumLegth){
			//push it into errors
			array_push($form_errors, ''.$field.' should be '.$minimumLegth.' characters long');
		}
	}
	return $form_errors;
}

/* checking email
*/
function check_email($poseted_data){
	//errors container
	$form_errors = array();
	//the key to check
	$key = 'email';

	//if the key exists in the posted data
	if(array_key_exists($key, $poseted_data)){
		//if its not empty
		if($_POST[$key] != null){
			//if the input is a valid email address
			if(filter_var($_POST[$key],FILTER_VALIDATE_EMAIL) === false){
				array_push($form_errors, ''.$key.' is not a valid Email address');
			}
		}
	}
	return $form_errors;
}

//used for showing errors

function show_errors($form_errors_array){
    $errors = "<p><ul style='color: red;'>";

    //loop through error array and display all cabins in a list
    foreach($form_errors_array as $the_error){
        $errors .= "<li> {$the_error} </li>";
    }
    $errors .= "</ul></p>";
    return $errors;
}

function flashmessage($message, $passFail ='fail'){
    if($passFail === 'pass'){
        $data = "<script type=\"text/javascript\">
                    swal({
                        title:\"Success!\",
                        text: \"".$message."\",
                        type:\"success\"       
                     });
                 </script>";
    }else{
        $data = "<script type=\"text/javascript\">
                    swal({
                        title:\"Error\",
                        text: \"".$message."\",
                        type:\"error\"       
                     });
                 </script>";;
    }
    return $data;
}

function redirectTo($location){
    header("location:".$location.".php");
}

function checkDuplicateEntries($table,$column_name,$val, $db){
    try{
        $sql="SELECT * FROM ".$table." WHERE ".$column_name."=:".$column_name;
        $statement = $db->prepare($sql);
        $statement->execute(array(":".$column_name => $val));
        if($row = $statement -> fetch()){
            return true;
        }
        return false;
    }catch (PDOException $ex){
        //handle exception
    }


}

function rememberMe($user_id){
    //Encrypting Cookie Data to base64
    $encryptedCookieData = base64_encode("lauJGckf92guy".$user_id);
    //sets the cookie to expire in 100 days
    setcookie("rememberUserCookie", $encryptedCookieData, time()+60*60*24*100, "/");
}
function isCookieValid(){
    $database = new db();
    $db = $database->connect();
    $isValid = false;
    //if a certain cookie exists then
    if (isset($_COOKIE['rememberUserCookie'])){
        //base64 Decoding to get the userID
        $decodedCookieData = base64_decode($_COOKIE['rememberUserCookie']);
        $cookieDataArray = explode("lauJGckf92guy",$decodedCookieData); // Breaks the string and adds it into an array
        $userID = $cookieDataArray[1];

        //check if the user id is tampered by matching it with database
        $sql = "SELECT * FROM users where user_id=:id";
        $statement = $db -> prepare($sql);
        $statement->execute(array(':id' => $userID));
        //if not tampered with then
        if ($row = $statement->fetch()){
            //its a valid cookie
            $isValid = true;

            //create user session Variable
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['fname'] =$row['fname'];
            $_SESSION['lname'] =$row['lname'];
            $_SESSION['verified'] = $row['verified'];

            $_SESSION['last_active'] = time();
            $_SESSION['fingerprint'] =md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
        }else{        //or else

        //its a invalid cookie
            $isValid = false;
        //Sign out user
            signout();
        }


    }
    //return validity status
    return $isValid;

}

function signout(){
    unset($_SESSION['id']);
    unset($_SESSION['username']);

    if(isset($_COOKIE['rememberUserCookie'])) {
        unset($_COOKIE['rememberUserCookie']);
        setcookie("rememberUserCookie", null, -1, "/");
    }

    session_destroy();
    // session_regenerate_id(true);
    redirectTo('index');

}

function guard(){
    $isValid = true;
    $inactive = 60*30; //5 mins
    $fingerprint = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

    //if there is fingerprint in session(User is logged in and it does not matches the current fingerprint
    if (isset($_SESSION['fingerprint']) && $_SESSION['fingerprint'] != $fingerprint){
        $isValid= false;
        signout();
    }elseif (isset($_SESSION['last_active']) && time() - $_SESSION['last_active'] > $inactive){
        $isValid = false;
        signout();
    }else{
        $_SESSION['last_active'] = time();
    }
    return $isValid;
}

//Sends out a mail for activation of the
function sendActivationMail($email, $fname = 'Dear', $lname ='User'){
    //Get data
    $sender = $GLOBALS['email'];
    $message = "<h2>Welcome to ".$GLOBALS['sitename'].", ".$fname." ".$lname."</h2>
                <p>This mail is to let you know that an account was created in <a href='".SITE_URL."'>".$GLOBALS['sitename']."</a> and Your Details are below: </p>
                <br/>
                <table border='1'>
                 <thead>
                  <tr>
                     <th>Name</th>
                     <th>Email</th>
                  </tr>
                 </thead>                 
                 <tbody>
                  <tr>
                     <td>".$fname." ".$lname."</td>
                     <td>".$email."</td>
                  </tr>                  
                 </tbody>
                </table> <br><br>
                <h3>You need to activate before you can use this account. Please Click Below</h3><br>                 
                <a href='".SITE_URL."/activate.php?user=".base64_encode($email)."' style='padding: 10px; text-decoration:none; background:purple;color:white;'>Activate Account</a><br><br>
                <p>if that Doesnt work Copy and paste this to your browser: <br> ".SITE_URL."/activate.php?user=".base64_encode($email)."</p>
                <br><br>
                <h1>Thank You</h1>";


    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $GLOBALS['email'];                 // SMTP username
        $mail->Password = $GLOBALS['email_password'];                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
         );        

        //Recipients
        $mail->setFrom($sender, $GLOBALS['sitename']);
        $mail->addAddress($email);     // Add a recipient
        $mail->addReplyTo($sender);

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $GLOBALS['sitename'].' Account Activation';
        $mail->Body    = $message;
        $mail->AltBody = 'This mail is to let you know that an account was created in '.SITE_URL.' and Your Copy the link to activate account:   '.SITE_URL.'/activate.php?user='.base64_encode($email);

        $mail->send();
//        Return 'Message has been sent';
    } catch (Exception $e) {
//        Return 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}


function activateUser($email){
    $database = new db();
    $db=$database->connect();
    try{
        $sql = "UPDATE users SET verified=1 WHERE email = :email";
        $statement = $db->prepare($sql);
        $statement->execute(array(':email'=>$email));
        if ($statement->rowCount() == 1){
            swal('Your account Has been activated','You can now Login', 'success','index.php' );
        }
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }
}

function generateRandomString($length = 10) {
    $dev = new developer();
    return $dev->generateKey();
}

function sendForgotPassMail($email, $token){
    //Get data
    $sender = $GLOBALS['email'];
    $message = "<h2>Welcome to ".$GLOBALS['sitename']."</h2>
                <p>This mail is to let you know that an account was created in <a href='".SITE_URL."'>".$GLOBALS['sitename']."</a>. You have requested Password Reset for:</p>
                <br/>
                <table border='1'>
                 <thead>
                  <tr>
                     <th>Email</th>
                     <th>".$email."</th>
                  </tr>
                 </thead>
                 </table>                 
                  <br><br>
                <h3>Please Click Below to reset Your Password:</h3><br>                 
                <a href='".SITE_URL."/userlogin.php?forgotpass=1&email=".base64_encode($email)."&token=".$token."' style='padding: 10px; text-decoration:none; background:purple;color:white;'>Reset Password</a><br><br>
                <p>if that Doesnt work Copy and paste this to your browser addressbar: <br> ".SITE_URL."/index.php?forgotpass=1&email=".base64_encode($email)."&token=".$token."</p>
                <br><br>
                <h1>Thank You</h1>";


    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $GLOBALS['email'];                 // SMTP username
        $mail->Password = $GLOBALS['email_password'];                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
         );

        //Recipients
        $mail->setFrom($sender, $GLOBALS['sitename']);
        $mail->addAddress($email);     // Add a recipient
        $mail->addReplyTo($sender);

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $GLOBALS['sitename'].' Password Reset';
        $mail->Body    = $message;
        $mail->AltBody = 'This mail is to let you know that an account was created in  '.$GLOBALS['sitename'].' and Your Copy the link to Reset password of the account:   '.SITE_URL.'/index.php?forgotpass=1&email='.base64_encode($email).'&token='.$token;

        $mail->send();
//        Return 'Message has been sent';
    } catch (Exception $e) {
//        Return 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

function addToken($db,$email, $token){
    try {
        $sql = "INSERT INTO security_tokens (user_id,content) VALUES((SELECT user_id FROM users WHERE users.email = :email), :content)";
        $statement = $db->prepare($sql);
        $statement -> execute([':email' => $email, ':content' => $token]);
        if ($statement ->rowCount() ==1) {
            return true;
        }else{
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function matchToken($db,$email, $token){
    try {
        $sql = "SELECT count(*) FROM security_tokens WHERE user_id = (SELECT user_id FROM users WHERE users.email = :email) AND content = :content AND used=0";
        $statement = $db->prepare($sql);
        $statement -> execute([':email' => $email, ':content' => $token]);
        $i=0;
        while ($row = $statement->fetch()) {

            if ($row['count(*)'] >= 1 || $i >= 1) {
                return true;
            }else{
                return false;
            }
            $i++;
        }
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function useToken($db, $token){
    try {
        $sql = "UPDATE security_tokens SET used = 1 WHERE  content = :content";
        $statement = $db->prepare($sql);
        $statement -> execute([':content' => $token]);
        if ($statement ->rowCount() ==1) {
            return true;
        }else{
            return false;
        }
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function updatePassword($db,$hashed_password, $email){
 try {
        $sql = "UPDATE users SET password = :password WHERE email = :email";
        $statement = $db->prepare($sql);
        $statement -> execute([':password' => $hashed_password , ':email' => $email]);
        if ($statement ->rowCount() ==1) {
            return true;
        }else{
            return false;
        }
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


function lastInsertId($db, $table=''){
    if ($table == ''){
        return 'Error , No table name was Provided';
    }else{
        try {
            $sql = 'SELECT * FROM `'.$table.'` WHERE id=(SELECT MAX(id) FROM `'.$table.'`)';
            $statement = $db ->prepare($sql);
            $statement-> execute();
            while($row = $statement -> fetch()){
                return $row['id'];
            }

        } catch (PDOException $e) {
          echo $e->getMessage();   
        }
    }
}

function swal ($title='',$msg='', $type = 'warning',$redirect='none', $timer = null){
    $html = '<script type="text/javascript">
    jQuery(function(){
            swal({
                title:"'.$title.'",
                text: "'.$msg.'",
                ';
    $html .=   'type:"'.$type.'",
                ';
    $html .= ($timer != null )? 'showConfirmButton:false,timer: '.$timer.'}).then(function(){},function(dismiss){if (dismiss === "timer") {window.location.href="'.$redirect.'";}})': '})';
    $html .= ($redirect != 'none')? '.then(function() {window.location.href="'.$redirect.'";})':'';
    $html .= '});</script>';


    echo $html;
}


function numRows($db,$table='cabins'){
    try {
        $sql= "SELECT COUNT(*) FROM ".$table;
        $statement = $db -> prepare($sql);
        $statement -> execute();

        $row = $statement->fetch();
        return $row["COUNT(*)"];
    } catch (PDOException $e) {
        //
    }
}

function pageClass($cls="home"){
    echo '<script>$("body").addClass("'.$cls.'")</script>';
}
function jsRedirect($cls="index.php"){
    echo '<script>window.location.href="'.$cls.'"</script>';
}


//Get the role
function getRole($id){
    $database = new db();
    $db = $database->connect();
    try {
        $sql = "SELECT role FROM users WHERE user_id=:id";
        $statement = $db->prepare($sql);
        $statement->execute([':id'=>$id]);
        while ($row = $statement->fetch()) {
            if ($row['role'] == 0) {
                return 'Administrator';
            }elseif ($row['role'] == 1) {
                return 'Editor';
            }elseif ($row['role'] == 2) {
                return 'Restaurant';
            }else{
                return 'Restricted User';
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function userInfo($type,$id){
    $database = new db();
    $db = $database->connect();
    try {
        $sql = "SELECT * FROM users WHERE user_id=:id";
        $statement=$db->prepare($sql);
        $statement->execute([':id'=>$id]);
        if ($statement->rowCount() == 1 ) {
            while ($row = $statement->fetch()) {
                if (isset($row[$type])) {
                    return $row[$type];
                }else{
                    return ">Error<";
                }
            }
        }else{
            return '>Error<';
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


function printUsertabels($db){
    try {
        $sql = "SELECT * FROM users";
        $statement = $db->prepare($sql);
        $statement->execute();
        while ($row = $statement->fetch()) {
            ?>
            <tr>
                <td><a href="manageusers.php?edit=<?=$row['id']?>" target="_blank"><?=$row['fname'].' '.$row['lname'] ?></a></td>
                <td><?= $row['designation'] ?></td>
                <td><?=$row['username']?></td>
                <td><?=$row['password']?></td>
                <td><?=$row['join_date']?></td>                
                <td><?=getRole($db,$row['id'])?></td>
                <td>
                <div class="btn-group">
                <a href="manageusers.php?edit=<?=$row['id']?>" data-original-title="Edit" data-toggle="tooltip" title="" type="button" class="btn btn-info" ><i class="fa fa-pencil"></i></a>
                <a href="manageusers.php?del=<?=$row['id']?>" onclick="return confirm('Are You Sure?');" data-original-title="Delete" data-toggle="tooltip" title="" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>                                             
                </div>
                </td>
            </tr>   
            <?php
        }
    } catch (PDOException $e) {
        
    }
}

function getBigdataNames($db,$table,$id_name,$id,$name_name){
    try {
        $sql = "SELECT * FROM ".$table." WHERE ".$id_name."= :".$id_name;
        $statement=$db->prepare($sql);
        $statement->execute([':'.$id_name => $id]);
        while ($row = $statement -> fetch()) {
            return $row[$name_name];
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function printRestaurantTypeChecks($db){
    try {
        $sql = "SELECT * FROM restaurant_types";
        $statement= $db->prepare($sql);
        $statement->execute();
        while ($row = $statement->fetch()) {
            ?>
            <div class="col m4">
              <input type="checkbox" id="<?=str_replace(' ', '', $row['restaurant_type_name'])?>" name="restaurant_type_id[]" value="<?=$row['restaurant_type_id']?>"/>
              <label for="<?=str_replace(' ', '', $row['restaurant_type_name'])?>"><?=$row['restaurant_type_name']?></label>
            </div>
            <?php
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


function printRestaurantOption($db,$table,$id,$name){
    try {
        $sql = "SELECT * FROM ".$table;
        $statement= $db->prepare($sql);
        $statement->execute();
        while ($row = $statement->fetch()) {
            ?>
            <option value="<?=$row[$id]?>"><?=$row[$name]?></option>
            <?php
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


function getSingleData($db,$column_name, $table, $id_name, $id ){
    try {
        $sql = "SELECT ".$column_name." FROM ".$table." WHERE ".$id_name." = :id";
        $statement = $db->prepare($sql);
        $statement ->execute([':id' => $id]);
        $row = $statement ->fetch();
        return $row[$column_name];
        
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

function fileUploaded($fieldname){
    if(empty($_FILES)) {
        return false;       
    }
    $file = $_FILES[$fieldname];
    if(!file_exists($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])){        
        return false;
    }
    return true;
}

function isFileAcceptableSize($formfield, $maxSize){
    if ($_FILES[$formfield]["size"] > $maxSize) {        
        return false;
    }else{        
        return true;
    }    
}

function printDashBoardData($data_type,$user_id,$limit)
/*
* Data types : 1 - Data Update
*              2 - Offer Update
*/
{
    $database = new db();
    $db= $database->connect();
    try {
        $statement =  $db->prepare("SELECT * FROM dashboard_updates WHERE user_id=:user_id AND data_type = :data_type LIMIT $limit");
        $statement -> execute(array(
            ':user_id' => $user_id,
            ':data_type' => $data_type
        ));
        while ($row = $statement->fetch()) {
            ?>
            <div class="spacing-80"></div>
            <div class="card card-nav-tabs">                                    
              <div class="card-header card-header-<?= ($row['status'] == 1) ? 'success' : 'warning' ?>">
                <h4 class="title no-margin"><?=  ($row['status'] == 1) ? 'DONE' : 'WAITING' ?></h4>
              </div>
              <div class="card-body">
                <h4 class="card-title"><?= $row['subject']?></h4>
                <p class="card-text truncate"><?= strip_tags($row['msg_body']);?></p>                                    
              </div>
              <div class="card-footer text-muted">
                <a href="#" class="card-link" data-toggle="tooltip" data-placement="bottom" title="Type of Update">
                      <i class="material-icons">update</i> 
                      <?= ($row['data_type'] == 1) ? 'DATA UPDATE' : 'OFFER UPDATE';?>
                  </a>     
                  <a href="#" class="card-link" data-toggle="tooltip" data-placement="bottom" title="Attachments">
                      <i class="material-icons">layers</i> 
                      <?=attachmentCount($row['data_id']);?> files
                  </a>
                   <a href="#" class="card-link" data-toggle="tooltip" data-placement="bottom" title="TicketID">
                      <i class="material-icons">fingerprint</i> 
                      <?= ($row['data_type'] == 1) ? 'DU'.$row['data_id'] : 'OU'.$row['data_id'];?>
                  </a>
                   <a href="#" class="card-link" data-toggle="tooltip" data-placement="bottom" title="Time">
                      <i class="material-icons">access_time</i> 
                      <?= $row['time']?>
                  </a>
              </div>
            </div>
            <?php
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}



function attachmentCount($data_id)
{
    $database = new db();
    $db= $database->connect();
    try {
        $statement = $db->prepare("SELECT COUNT(*) AS attachmentCount FROM dashboard_updates_attchments WHERE data_id = :data_id");
        $statement->execute(array(
            ':data_id'=> $data_id
        ));
        $row = $statement->fetch();
        return $row['attachmentCount'];
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

?>
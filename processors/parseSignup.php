<script src="../assets/js/core/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.12.15/dist/sweetalert2.all.js"></script>
<?php
//include form validation utilities
include_once '../resource/utilities.php';
$database = new db();
$db = $database->connect();
$apiMode = isset($_REQUEST['source']) == 'web' ? false : true;
//empty array for storing errors  
$form_errors = array();

if ($apiMode) { //called from api
    $email = $_REQUEST['data']['email'];
    $username = $_REQUEST['data']['username'];
    $fname = $_REQUEST['data']['firstname'];
    $lname = $_REQUEST['data']['lastname'];
    $gender = $_REQUEST['data']['gender'];    
    $password = $_REQUEST['data']['password'];
    $source = $_REQUEST['data']['source'];
/*
{
    array(3) {
    ["firstname"]=>
    string(7) "safayat"
    ["lastname"]=>
    string(5) "jamil"
    ["email"]=>
    string(10) "Omuk email"
  }
*/

}else{ //called frm web
    //array containing form validation required fields
    $required_fields = array('email', 'password', 'username', 'fname','lname');
    //check empty fields
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));
    $minimum_lengths_fields = array('email' => 8 , 'password' => 6);

    //checking the minimum lengths
    $form_errors = array_merge($form_errors, check_min_legth($minimum_lengths_fields));

    //validating the email from the posed data
    $form_errors = array_merge($form_errors, check_email($_POST));
    //collect form data and store in variables
    $email = $_POST['email'];    
    $password = $_POST['password'];    
    $fname= $_POST['fname'];
    $lname =  $_POST['lname'];
    $username = $_POST['username'];
    $source ="website";
    $gender = $_POST['gender'];
    if(checkDuplicateEntries("users","email",$email,$db) || checkDuplicateEntries("users","username",$username,$db)){
        swal('Sorry','The User with same username or email already exists','error','../index.php');
        die();
    }
}



//now if there's no error then
    if(empty($form_errors)){

        //hashing the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        try{
            //create SQL insert statement
            $sqlInsert = "INSERT INTO users (email, password, fname, lname, join_date, username,gender)
              VALUES (:email, :password, :fname, :lname, now(), :username,:gender)";

            //use PDO prepared to sanitize data
            $statement = $db->prepare($sqlInsert);

            //add the data into the database
            $statement->execute(array(':email' => $email, ':password' => $hashed_password, ':fname' => $fname, ':lname' => $lname , ':username' => $username, ':gender'=>$gender));
            $this_id=$db->lastInsertId();
            //check if one new row was created
            if($statement->rowCount() == 1){
                sendActivationMail($email, $fname, $lname);

                echo $result ="<script type='text/javascript'>
                $(function(){
                    swal({
                        title:\"Thank you\",
                        text: \"Registration Completed Successfully. Please Verify Your Email\",
                        type:\"success\"}).then(function() {
                            window.location.href='../index.php';
                         }, function(dismiss){});
                });
                </script>";
            }
        }catch (PDOException $ex){
            swal("An error occurred: ",$ex->getMessage(), 'error');
        }
    }else {
        //if there is an error
        if (count($form_errors) == 1) {
            $result = "<ul style='color:red'>";
            foreach ($form_errors as $error) {
                $result .= "<li> {$error} </li>";
            }
            $result .= "</ul>";
            swal('Error', $result,'error','../index.php');

        } else {
            $result = "There were " . count($form_errors) . " errors in the form <ul style='color:red'>";
            //loop through all the errors for printing
            foreach ($form_errors as $error) {
                $result .= "<li> {$error} </li>";
            }
            $result .= "</ul>";
            swal('Error', $result,'error','../index.php');


        }
    }

?>
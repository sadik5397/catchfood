<?php
include_once 'resource/utilities.php';
$database = new db();
$db= $database->connect();

if (isset($_POST['profile_change'])){
    $form_errors = array();
   $fname = (isset($_POST['fname'])) ?  $_POST['fname'] : userInfo('fname',$_SESSION['id']);
   $lname = (isset($_POST['lname'])) ?  $_POST['lname'] : userInfo('lname',$_SESSION['id']);   
   $phone = (isset($_POST['phone'])) ?  $_POST['phone'] : userInfo('phone',$_SESSION['id']);
   $short_desc = (isset($_POST['short_desc'])) ?  $_POST['short_desc'] : userInfo('short_desc',$_SESSION['id']);

   $upload_dir['profile_img'] = "uploads/users/profile_img/";
    $upload_dir['cover_img'] = "uploads/users/cover_img/";      

    $sql = "UPDATE users SET fname = :fname, lname = :lname, phone=:phone, short_desc = :short_desc";
    $updaterArr = array(':fname'=> $fname,':lname'=>$lname,':phone' => $phone, ':short_desc' => $short_desc);

    if (isset($_POST['email']) && $_POST['email'] != userInfo('email',$_SESSION['id']) ) {
        $email = $_POST['email'];
        $updaterArr = array_merge($updaterArr, [':email' => $email]);
        $sql .= ", email = :email";
    }




    //process Profile Image
   if (fileUploaded('profile_img')) {
       $profile_img = time().$_FILES["profile_img"]["name"];
       $profile_img_target = $upload_dir['profile_img'].$profile_img;
       if (isFileAcceptableSize('profile_img', 5242880)) { 
           if (move_uploaded_file($_FILES["profile_img"]["tmp_name"], $profile_img_target)) {
                //Upload success
                $sql .= ", profile_img = :profile_img" ;
               $updaterArr = array_merge($updaterArr,array(':profile_img'=>$profile_img));
           }else{
                array_push($form_errors,'Profile Image Could Not be Uploaded');
           }
       }else{
           array_push($form_errors,'The Profile image is too big');
       }
   }

   //process cover img
   if (fileUploaded('cover_img') && sizeof($form_errors) == 0) {
       $cover_img = time().$_FILES["cover_img"]["name"];
       $cover_img_target = $upload_dir['cover_img'].$cover_img;
       if (isFileAcceptableSize('cover_img', 5242880)) { // if file is not greater than 5 MB
        //Upload the file
           if (move_uploaded_file($_FILES["cover_img"]["tmp_name"], $cover_img_target)) {
                //Upload success
                //Update the sql query string and array
                $sql .= ", cover_img = :cover_img" ;
              $updaterArr = array_merge($updaterArr,array(':cover_img'=>$cover_img));
           }else{
                array_push($form_errors,'Cover Image Could Not be Uploaded');
           }
       }else{
        array_push($form_errors,'The Cover image is too big');
       }
   }

   if (sizeof($form_errors) == 0) { // No errors
    try{
        $sql .= " WHERE user_id=".$_SESSION['id'];        
        // var_dump($updaterArr);
        // echo "<br><br>";
        // var_dump($sql);
       $statement = $db->prepare($sql);
       $statement->execute($updaterArr);

       if ($statement->rowCount() >= 1 ) {
           swal('Success!', 'Your Profile Has been Updated','success','account.php');
       }
    }catch(PDOException $e){
        echo "<br>".$e->getMessage();
    }
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
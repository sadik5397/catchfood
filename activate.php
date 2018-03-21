<?php
include_once 'resource/utilities.php';
if (isset($_GET['resend'])){ // If user Requested to send the mail again
$lname = $_GET['lname'];
$fname = $_GET['fname'];
$email = $_GET['email'];

sendActivationMail($email, $fname, $lname);

}else{
IF(isset($_GET['user'])) :
?>

<html>
<head>
<script src="assets/js/core/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.12.15/dist/sweetalert2.all.js"></script>
</head>
<body>
<?php
$email = base64_decode($_GET['user']);
activateUser($email);
ELSE:
header("location:index.php");
ENDIF;
}
?>
</body>

</html>

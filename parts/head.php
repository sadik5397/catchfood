<?php  
include_once 'resource/session.php';
include_once 'resource/utilities.php';

//if the user selected remeber me
if (isset($_COOKIE['rememberUserCookie'])) {
    isCookieValid();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta property="og:title" content="<?=$GLOBALS["sitename"]?>" />    
    <meta property="og:url" content="<?=SITE_URL?>" />
    <meta property="og:image" content="http://catchfood.net/wp-content/uploads/11-11.png" />


    <!-- Favicons -->
    <link rel="apple-touch-icon" href="./assets/img/kit/free/apple-icon.png">
    <link rel="icon" href="./assets/catchfood_ico.png">
    <title>
        <?=$GLOBALS["sitename"]?> <?= (isset($page_title)) ? " | ".$page_title : "" ?>
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="./assets/assets-for-demo/vertical-nav.css" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/material-kit.min.css?v=2.0.2">
    <!-- Documentation extras -->
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/assets-for-demo/demo.css" rel="stylesheet" />
    
    <link href="./assets/css/colors.css" rel="stylesheet" />
    <link href="./assets/css/style.css" rel="stylesheet" />
    <script src="./assets/js/core/jquery.min.js"></script>
    <!-- SELECT2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> 

    <!-- OTHERS -->
    <link rel="stylesheet" type="text/css" href="assets/css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.min.css">

    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/validator.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.12.15/dist/sweetalert2.all.js"></script>
    <!-- tinyMCE -->
    <script src='assets/lib/tinymce/tinymce.min.js'></script>
      <script>
      tinymce.init({
        selector: '.wysig',
        height: 200,
  theme: 'modern',
  plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
  image_advtab: true,
      });
      </script>

<?php if (isset($_SESSION['id'])): ?>
    <script type="text/javascript">
        window.USER={
            id: '<?=$_SESSION['id']?>',
            role: '<?=$_SESSION['role']?>',
        }
    </script>
<?php endif ?>
</head>
<!-- parseFB login -->
<?php include_once 'parts/login_with_fb.php'; ?>
<?php  
include_once 'resource/session.php';
include_once 'resource/utilities.php';
if (!isset($_SESSION['id'])) {
	redirectTo('index');
}
?>
<?php IF(isset($_GET['logout'])): ?>
<!-- lOGOUT -->
	<?php header("location:logout.php"); ?>
<?php ELSEIF(isset($_GET['forgotpass'])): ?>
<!-- FORGOTPASS -->
<?php ELSEIF(isset($_GET['resetpass'])): ?>
<!-- RESETPASS -->
<?php ELSEIF(isset($_GET['settings'])): ?>
<!-- SHOW SETTINGS -->
	<?php include_once 'parts/pages/profile_settings.php'; ?>
<?php ELSE: ?>
<!-- PROFILE -->
	<?php include_once 'parts/pages/profile.php'; ?>
<?php ENDIF; ?>
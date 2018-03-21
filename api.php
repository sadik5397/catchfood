<?php
include_once 'resource/session.php';
include_once 'resource/utilities.php';
$api = new developer();
$dev = isset($_REQUEST['username']) ? $_REQUEST['username'] : '-1';
$key = isset($_REQUEST['key']) ? $_REQUEST['key'] : '-1';
IF($api->validateApiKey($dev, $key)):
header("Access-Control-Allow-Origin: *");
header("Content-Type:application/json");
$output = (object) array();
if (isset($_REQUEST['action'])) {
	


if ($_REQUEST['action'] == 'signup') {
	$output->msg= $_REQUEST;
}elseif ($_REQUEST['action'] == 'sendMsgToEditor') {
	$dashboard = new dashboard();	
	$output->msg = $dashboard -> sendMsgToEditor($_REQUEST['data']['msg'], $_REQUEST['data']['user_id']);
}






}
echo json_encode($output);
ELSE:
header('HTTP/1.0 401 Unauthorized');
$output = (object) array();
$output->msg = "Auth Error";
$output->code = "401";

echo json_encode($output);
ENDIF;

?>
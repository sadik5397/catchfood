<?php
if((@include __DIR__.'/config.php') === false)
{
    header('location:./install');
}
try{	
	$database = new db();
	$db = $database->connect();	

}catch(PDOException $ex){
	header('location:./install');
	echo "connection_failed".$ex->getMessage();
	
}

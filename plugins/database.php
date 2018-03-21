<?php  
/**
* 
*/
class db
{
	public function connect(){
		try {
			$dsn="mysql:host=".db_host.";dbname=".db_name;
			$dbconnection = new PDO($dsn, db_username,db_password);
			$dbconnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			return $dbconnection;
		} catch (PDOException $e) {
			header('location:./install');	
		}
		
	} 
	
}
?>
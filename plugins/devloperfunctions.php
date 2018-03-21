<?php  
/**
* 
*/
class developer
{
    public $db; 

    public function __construct()
    {
        $database = new db();
        $this->db = $database->connect();
    }

    public function generateKey($strength = "8"){
        $token = bin2hex(openssl_random_pseudo_bytes($strength));
        return $token;
    }

    public function validateApiKey($username = "-1", $key ="-1"){
        try {
            $db = $this->db;
            if ($username == "-1" || $key == "-1") {
                return false;
            }else{
                $statement = $db->prepare("SELECT * FROM api_keys WHERE user_id = :user_id AND api_key = :api_key");
                $statement ->execute(array(
                               ":user_id" => getSingleData($db,"user_id", "users","username",$username),
                               ":api_key" => $key
                            ));
                if ($statement->rowCount()) {
                    return true;
                }else{
                    return false;
                }
            }
        } catch (PDOException $e) {
            return $e;
        }
    } 
    public function isDev($user_id){
        try {
            
        } catch (PDOException $e) {
            
        }
    }
    public function addDev($user_id){    
        try {
            $statement = $this->$db->prepare("INSERT INTO api_keys (user_id, api_key) VALUES(:user_id,:api_key)");
            if (isDev($user_id) == false) {
                $statement = $this->$db ->execute([':user_id' => $user_id, ':api_key' => $this->generateKey()]);
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}



?>
<?php  
class dashboard
{
    public $db; 

    public function __construct()
    {
        $database = new db();
        $this->db = $database->connect();
    }
    public function sendMsgToEditor($msg, $user_id){
        $db = $this->db;
        try {
            $statement = $db->prepare("INSERT INTO msg_to_editor (msg,user_id) VALUES(:msg,:user_id)");
            $statement->execute([':msg' => $msg, ':user_id'=> $user_id ]);

            if ($statement->rowCount() == 1) {
                return "Message Sent";
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    
}



?>
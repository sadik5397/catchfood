<?php
include_once 'resource/utilities.php';
include_once 'resource/plugin.php';

if(isset($_POST['loginBtn'])){
$console = new jsConsole();
//errors
    $form_errors = array();
//validate
    $required_fields = array('password','emailusername');
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));
    if(empty($form_errors)){
        $console->log('No form Errors');
        //collect data

        $password = $_POST['password'];
        $emailusername = $_POST['emailusername'];
        isset($_POST['remember']) ? $remember = $_POST['remember'] : $remember="";

        $console->log('Data Collected');
        try {
           if(filter_var($_POST['emailusername'], FILTER_VALIDATE_EMAIL)) {
                $input_type = 'email';
            }
            else {
                 $input_type = 'username';
            }
        
        $sql = "SELECT * FROM users WHERE ".$input_type." = :".$input_type;
        $statement = $db->prepare($sql);
        $statement -> execute(array(':'.$input_type => $emailusername));
        $console->log('Executed');
        // $x = $statement->fetch();
        // var_dump($x);
        //  if ($x === false) {
        //      swal("Error","Invalid Username or password",'error','userlogin.php');
        //  }
            
        while($row = $statement -> fetch()){
            $console->log('Inside While Loop');
            $id = $row['user_id'];
            $email = $row['email'];
            $fname = $row['fname'];
            $hashed_password = $row['password'];
            

            if(password_verify($password, $hashed_password)){
                $console->log('Password verified');
                $_SESSION['id'] = $id;
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $row['role'];
                $_SESSION['fname'] =$row['fname'];
                $_SESSION['lname'] =$row['lname'];

                $fingerprint = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
                $_SESSION['last_active'] = time();
                $_SESSION['fingerprint'] = $fingerprint;

                $console->log('SESSIONS SET');
                if ($remember === 'yes'){
                    rememberMe($id);
                }

                if(!isset($_GET['ref'])){                    // var_dump($_SESSION);
                    
                    echo $result ="<script type='text/javascript'>
                $(function(){
                   swal({
                         title: \"Welcome Back $fname!\",
                          text: \"You are being logged in.\",
                          timer: 2000,
                          onOpen: () => {
                            swal.showLoading()
                          }
                        }).then((result) => {
                          if (
                            // Read more about handling dismissals
                            result.dismiss === swal.DismissReason.timer
                          ) {
                            window.location.href='index.php';
                          }
                        })
                });
                </script>";
                }elseif ($_GET['ref']=='admin') {
                    echo $result ="<script type='text/javascript'>
                    $(function(){
                   swal({
                         title: \"Welcome Back $fname!\",
                          text: \"You are being logged in.\",
                          timer: 2000,
                          onOpen: () => {
                            swal.showLoading()
                          }
                        }).then((result) => {
                          if (
                            // Read more about handling dismissals
                            result.dismiss === swal.DismissReason.timer
                          ) {
                            window.location.href='admin/index.php';
                          }
                        })
                });
                </script>";
                }





            }else{
                $console->log('INVALID PASSWORD');
                echo $result = "<script type='text/javascript'>
                    swal({
                    title: \"Error!\",
                    text: \"Invalid Username or password.\",                    
                    type:'error',                    
                    });
                </script>";

            }

        }
           
        } catch (PDOException $e) {
           $console->log($e->getMessage()) ;
        }

    }else{
        foreach ($form_errors as $error) {

           echo swal('Error',$error,'error');

        }       

    }



}









?>
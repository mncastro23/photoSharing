<?php
require_once('config.php');
?>

<?php

if(isset($_POST)){
            $firstname      = $_POST['firstname'];
            $lastname       = $_POST['lastname'];
            $email          = $_POST['email'];
            $password       = sha1($_POST['password']);
            $crtdt          = date("Y-m-d H:i:s");

           

            $sql = "INSERT INTO users (firstname,lastname,email,password,crtdt) VALUES(?,?,?,?,?)";
        
            $stmtinsert = $db->prepare($sql);
        
            $result = $stmtinsert->execute([$firstname,$lastname,$email,$password,$crtdt]);
        
             if($result){
                echo '1';
            }else{
                echo '0';
            }

    
        }else{
        	echo "no data";
        }
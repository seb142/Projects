<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once('functions.php');
$signupform = false;


$error   = ''; // Variable To Store Error Message
$errors  = ''; // Variable To Store Error Message
$errorss = '';
if (isset($_POST['signup'])) {
           
            $email = $_POST['email'];
            $username = $_POST['username'];
            $name = $_POST['name'];
        	$password = $_POST['password'];
        	$mysql_date_now = date("Y-m-d H:i:s");
           
try {
            $con = new PDO('mysql:host=localhost;dbname=twittum', "root", "");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                      
                $stmt = $con->prepare('INSERT INTO users (username, name, password, email) VALUES 
                (:username, :name, :password, :email)');


                 $stmt->bindParam(':username', $username);
                 $stmt->bindParam(':name',  $name);
                 $stmt->bindParam(':password', $password);
                 $stmt->bindParam(':email', $email);
                
                 $stmt->execute();

             }catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }

                $con = null;
                

            
            }
                 
                if (isset($_POST['signupform'])) {
                $signupform = true;

                }       
          
            
            
       
?>
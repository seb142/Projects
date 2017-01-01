<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once('functions.php');



$error   = ''; // Variable To Store Error Message
$errors  = ''; // Variable To Store Error Message
$errorss = '';
if (isset($_POST['go_to_profile'])) {
           session_start();
            $_SESSION['usertovisit'] = $_POST['visituserid'];
            
           
try {
          
          header("location: visitprofile.php");

             }catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }

                $con = null;
                

            
            }
                 
                           
function getTweeterToVisit(){
try {
	$tweeter_to_visit = $_SESSION['usertovisit'];
	return $_SESSION['usertovisit'];


         }catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }

}
function getTweeterInfo($visited_user){
		try {
 $visit_user_info = array();

  $con = new PDO('mysql:host=localhost;dbname=twittum', "root", "");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $con->prepare('SELECT username FROM users WHERE 
      (:user_id = id)');

    $stmt->bindParam(':user_id', $visited_user);
    $stmt->execute();
    
    $visit_user_info = $stmt->fetchColumn();

  return $visit_user_info;
  $con = null;

     }catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }

}
            
            
       
?>
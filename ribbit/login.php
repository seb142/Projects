<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$error1 = ''; // Variable To Store Error Message
include_once('functions.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$loginform = false;

if (isset($_POST['login'])) {
   try {   
    // Alltid när en bracet öppnas allt under måste tabas
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error1 = "Username or Password is invalid";
        header("Access-Control-Allow-Origin: *");
        
    } else {
        // Define $username and $password
      $username = $_POST['username'];
      $password = $_POST['password'];

        // Establishing Connection with Server by passing server_name, user_id and password as a parameter

      $con = new PDO('mysql:host=localhost;dbname=twittum', "root", "");
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



        // SQL query to fetch information of registerd users and finds user match.

      $stmt = $con->prepare('SELECT * FROM users WHERE :password = password AND :username = username');
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':password',  $password);


      $stmt->execute();

      $num_rows = $stmt->rowCount();

      $row = $stmt->fetch(PDO::FETCH_BOTH);

      if ($num_rows == 1) {
            //$_SESSION['login_user'] = $usernamee; // Initializing Session

        setSession($row['id'],$username);
            header("location: profile.php"); // Redirecting To Other Page
        } 
        else {
            $error1 = "Username or Password is invalid";
            
        }
    }

}catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$con = null;


}
if (isset($_POST['loginform'])) {

    $loginform = true;

}




function json_login($usernamejson, $passwordjson){

    $user = new stdClass();
    $user->username = $usernamejson;
    $user->password = $passwordjson;

    $data = json_encode(($user),JSON_PRETTY_PRINT);
    $fh = fopen("json/$usernamejson.txt", "x");
    fwrite($fh, $data);
    fclose($fh);

}   


if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }


    //http://stackoverflow.com/questions/15485354/angular-http-post-to-php-and-undefined
    $postdata = file_get_contents("php://input");
    if (isset($postdata)) {

       $request = json_decode($postdata);
       if (is_object($request)){
           $username = $request->username;
           $password = $request->password;

           if ($username != "") {
               echo "Server returns: " .  $password;
               login_query($username, $password);
           }
           else {
               echo "Empty username parameter!";
           }
       }
   }
   else {
       echo "Not called properly with username parameter!";
   }


   function login_query($username, $password){
     try { 



        $con = new PDO('mysql:host=localhost;dbname=twittum', "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $con->prepare('SELECT * FROM users WHERE :password = password AND :username = username');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password',  $password);


        $stmt->execute();

        $num_rows = $stmt->rowCount();

        $row = $stmt->fetch(PDO::FETCH_BOTH);

        if ($num_rows == 1) {
            //$_SESSION['login_user'] = $usernamee; // Initializing Session
            echo "lyckad sql";
            json_login($username, $password);
        } 
        else {
            $error1 = "Username or Password is invalid";
            
        }


    }catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
    $con = null;




}

?>
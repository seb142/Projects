<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$error  = ''; // Variable To Store Error Message
$errors = ''; // Variable To Store Error Message
$text   = '';
//echo $login_user;
include_once('functions.php');
$login_session_name = getUserName();
$login_session_id = getUserId();
$comment = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["comment"])) {
		$comment = "";
	} else {
		$comment = test_input($_POST["comment"]);
	}
}


function getFollowsOnProfile($user_id){
  try {
	$follows = array();
	$con = new PDO('mysql:host=localhost;dbname=twittum', "root", "");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $con->prepare('SELECT user_id FROM Follows WHERE (followee_id = :followee_id )');

	$stmt->bindParam(':followee_id', $user_id);
	$stmt->execute();

	$row = $stmt->fetchAll();

	foreach($row as $data) {

		array_push($follows, $data);
	}
	return $follows;
$con = null;
}catch(PDOException $e)
{
  echo "Error: " . $e->getMessage();
}

}


function getFollowsByID($user_id, $user_to_follow){

	$con = new PDO('mysql:host=localhost;dbname=twittum', "root", "");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $con->prepare('SELECT followee_id FROM Follows WHERE (followee_id = :followee_id AND user_id = :user_id)');

	$stmt->bindParam(':followee_id', $user_id);
	$stmt->bindParam(':user_id', $user_to_follow);

	$stmt->execute();
	$num_rows = $stmt->rowCount();
	$profiles = array();

	return $num_rows;



}

?>
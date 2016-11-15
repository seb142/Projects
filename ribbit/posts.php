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

if (isset($_POST['toggle_follow'])) {

 $user_id = $_POST['userid'];

 try {
  switch ($_POST['type']) {

    case "Follow": 
    $con = new PDO('mysql:host=localhost;dbname=twittum', "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $con->prepare('INSERT INTO follows (user_id, followee_id) VALUES 
      (:user_id, :followee_id)');

    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':followee_id', $login_session_id);

    $stmt->execute();
    $con = null;
    break;

    case "Unfollow":

    $con = new PDO('mysql:host=localhost;dbname=twittum', "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $con->prepare('DELETE FROM follows WHERE 
      (:followee_id = followee_id AND :user_id = user_id)');
    $stmt->bindParam(':followee_id', $login_session_id);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $con = null;
  }

}catch(PDOException $e)
{
  echo "Error: " . $e->getMessage();
}

$con = null;
}
  
if (isset($_POST['delete_tweet'])) {

try {

  $tweet_id = $_POST['tweet_id'];

  $con = new PDO('mysql:host=localhost;dbname=twittum', "root", "");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $con->prepare('DELETE FROM tweets WHERE 
    (:user_id = user_id AND :tweet_id = id)');

  $stmt->bindParam(':user_id', $login_session_id);
  $stmt->bindParam(':tweet_id', $tweet_id);
  $stmt->execute();
  $con = null;

  }catch(PDOException $e)
{
  echo "Error: " . $e->getMessage();
}


}


function getUserTweets($visited_user_id){
  try {
  $tweets = array();

  $con = new PDO('mysql:host=localhost;dbname=twittum', "root", "");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



  $stmt = $con->prepare('SELECT * FROM tweets WHERE :user_id = user_id');


  $stmt->bindParam(':user_id',  $visited_user_id);
  $stmt->execute();
  $stmt->execute();


  $row = $stmt->fetchAll();

  foreach($row as $data) {

    array_push($tweets, $data);
  }

  return $tweets;
  $con = null;


  }catch(PDOException $e)
{
  echo "Error: " . $e->getMessage();
}


}




function getAllTweets(){

 try {

 $tweets = array();

 $con = new PDO('mysql:host=localhost;dbname=twittum', "root", "");
 $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



 $stmt = $con->prepare('SELECT * FROM tweets');

 $stmt->execute();


 $row = $stmt->fetchAll();




 foreach($row as $data) {

  array_push($tweets, $data);
}

return $tweets;
$con = null;




}catch(PDOException $e)
{
  echo "Error: " . $e->getMessage();
}

}

function getFollowedTweets($user_id){
  try {

  $tweets = array();
  $con = new PDO('mysql:host=localhost;dbname=twittum', "root", "");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  

  $stmt = $con->prepare('SELECT tweet, follows.user_id AS f_id,tweets.id AS t_id , created_at, tweets.user_id AS u_id
    FROM `tweets` 
    INNER JOIN `follows` ON follows.user_id = tweets.user_id
    AND follows.followee_id = :user_id
    ORDER BY created_at DESC');


  $stmt->bindParam(':user_id',  $user_id);
  $stmt->execute();
  $con = null;

  $row = $stmt->fetchAll();

  foreach($row as $data) {

    array_push($tweets, $data);
  }

  return $tweets;


  }catch(PDOException $e)
{
  echo "Error: " . $e->getMessage();
}

}


function getNameForTweet($req_id){

   try {
  $con = new PDO('mysql:host=localhost;dbname=twittum', "root", "");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  $stmt = $con->prepare('SELECT username 
    FROM users 
    WHERE :iD = id');

  $stmt->bindParam(':iD',  $req_id);
  $stmt->execute();
  $con = null;

  $row = $stmt->fetch();

  return $row;


  }catch(PDOException $e)
{
  echo "Error: " . $e->getMessage();
}

  
}


if (isset($_POST['postTweet'])) {
  $creation_time = date('Y-m-d H:i:s');
  $tweeter_id = $login_session_id;
  $tweet = $_POST['tweetText'];


  try {

    // $poster_id = "SELECT id FROM login WHERE username = ('$poster')";   
    $con = new PDO('mysql:host=localhost;dbname=twittum', "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*
    $result = mysqli_query($connection, "SELECT id FROM login WHERE  '$poster' = username"); 
    */
    $stmt = $con->prepare('INSERT INTO tweets (user_id, tweet, created_at) 
      VALUES (:user_id, :tweet, :created_at)');

    $stmt->bindParam(':user_id', $tweeter_id);
    $stmt->bindParam(':tweet', $tweet);
    $stmt->bindParam(':created_at', $creation_time);

    $stmt->execute();
    
    header("Location: profile.php");
    $con = null;

  }catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }

  
}







?>
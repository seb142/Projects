<?php
// Starts the sessions

 
if (isset($_POST['logout'])) {
logOut();
}

function startSession(){
    if(!isset($_SESSION)){
        session_start();
    }
}
function setSession($id, $username){
    startSession();
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $username;
    $_SESSION['usertovisit'] = 'asds';
    
    
}
function getUserName(){
    startSession();
    return $_SESSION['username'];
}



function getUserNameToVisit(){
   startSession();
    return $_SESSION["visit_id"];
 }

function getUserId(){
    startSession();
    return $_SESSION['id'];
}
function logOut(){
    startSession();
    $_SESSION['id'] = '';
    $_SESSION['username'] = '';
    session_destroy();
    header("Location: index.php");
}
?>
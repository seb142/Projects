
<?php
include('registration.php'); 
include('login.php'); 

?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    
    
    
    
        <link rel="stylesheet" href="assets/css/style.css">

    
    
    
  

  

    <html lang="en-US">

  <meta charset="utf-8">
    <title>Login</title>
    
   </head>

<body>

 
<h2>Twittum</h2>



<?php if(!$signupform ){ ?>


    <div id="login" class="btn-toolbar">
      <form name="form-login" method="post">

        <span class="fontawesome-user"></span>

          <input id="username" name="username"  placeholder="Username" type="text" >
       
        <span class="fontawesome-lock"></span>
          <input id="password" type="password" type="password"  name="password" placeholder="Password" >
        
        

        <input name="login" type="submit" value="Login"/>

        <input name="signupform" type="submit" value="Register"/>
        
      </form>
      </div>

        <?php }else{ ?>

<div id="login" class="btn-toolbar">
      <form name="form-login" method="post">

        <span class="fontawesome-user"></span>
         <input id="email" name="email" placeholder="Email" type="email">

        <span class="fontawesome-user"></span>

          <input id="username" name="username" placeholder="Username" type="text">
       
          <span class="fontawesome-user"></span>
        <input id="name" name="name" placeholder="Full Name" type="text">

        <span class="fontawesome-lock"></span>
          <input id="password" name="password" placeholder="Password" type="password">
        
        <input name="signup" type="submit" value="Submit"/>
        

        <input name="loginform" type="submit" value="Login"/>
      </form>
      </div>
          <?php } ?>

       



     
    
   
    
    
  </body>
</html>
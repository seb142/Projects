
<?php
include('registration.php'); 
include('login.php'); 

?>

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="assets/css/style.css" rel="stylesheet" />
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style>
  html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">

  <!-- Navbar -->
  <div class="w3-top">
    <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
      <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
        <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
      </li>
      <li><a href="#" class="w3-padding-large w3-theme-d4">Twittum</a></li>
      



    </li>

  </ul>
</div>

<!-- Navbar on small screens -->


<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card-2 w3-round w3-white">
     
      </div>
      <br>

      

    


      
    </div>

    <!-- Middle Column -->
    <?php if(!$signupform ){ ?>
    <div class="w3-col m7">

      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding">
            <form name="form-login" method="post">

        <span class="fontawesome-user"></span>

          <input id="username" name="username"  placeholder="Username" type="text">
       
        <span class="fontawesome-lock"></span>
        <br>
        <br>
          <input id="password" type="password" type="password"  name="password" placeholder="Password" >
          
            <br>
           <br>

        <input name="login" type="submit" value="Login" class="w3-btn w3-theme"/>

        <input name="signupform" type="submit" value="Register" class="w3-btn w3-theme"/>
        
      </form>
             
            </div>
          </div>
        </div>
      </div>
     
    <!-- End Middle Column -->
  </div>

  <?php }else{ ?>
    <div class="w3-col m7">
     <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding">
            

    <form name="form-login" method="post">

        <span class="fontawesome-user"></span>
         <input id="email" name="email" placeholder="Email" type="email">

        <span class="fontawesome-user"></span>
        <br>
        <br>
          <input id="username" name="username" placeholder="Username" type="text">
        
          <span class="fontawesome-user"></span>
        <br>
         <br>
        <input id="name" name="name" placeholder="Full Name" type="text">
        <br>
        <br>
        <span class="fontawesome-lock"></span>
          <input id="password" name="password" placeholder="Password" type="password">
          <br>
        <input name="signup" type="submit" class="w3-btn w3-theme" value="Submit"/>
        

        <input name="loginform" type="submit" class="w3-btn w3-theme" value="Login"/>
      </form>
           </div>
          </div>
        </div>
      </div>
     </div>
    <!-- End Middle Column -->
  



<!-- End Page Container -->
</div>
</div>
<br>

<!-- Footer -->

<?php } ?>

<script>
// Accordion

</script>

</body>
</html>
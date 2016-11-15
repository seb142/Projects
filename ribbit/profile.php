<?php
ini_set('display_errors',1); 
error_reporting(E_ALL);
//include_once('posts.php');
include_once('functions.php');
include_once('posts.php');
include_once('follows.php');
include_once('prof_manage.php');


//include_once('follows.php');
$login_session = getUserName();
$userID = getUserId();
$tweetsList = getFollowedTweets($userID);

//$delete = 'delete';

//$following = getFollowersByIDD($userID);

?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    
    

    
    
    
</head>

<body>

   <center>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
    <!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->

<!-- BOOTSTRAP STYLE SHEET -->
<script type="text/javascript">
//<![CDATA[
try{if (!window.CloudFlare) {var CloudFlare=[{verbose:0,p:0,byc:0,owlid:"cf",bag2:1,mirage2:0,oracle:0,paths:{cloudflare:"/cdn-cgi/nexp/dok3v=1613a3a185/"},atok:"dd8184e9786eaf01b13e4f911c1f324e",petok:"2771f527c3186027e5c838288ce12ef7da291c39-1469649200-1800",zone:"designbootstrap.com",rocket:"a",apps:{},sha2test:0}];document.write('<script type="text/javascript" src="//ajax.cloudflare.com/cdn-cgi/nexp/dok3v=0489c402f5/cloudflare.min.js"><'+'\/script>');}}catch(e){};
//]]>
</script>
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- CUSTOM STYLES -->
<link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">

        <h class="navbar-brand" >Logged in as: "<?php echo $login_session ?>"</h>
        <div class="dropdown pull-right">
            <ul class="nav navbar-nav navbar-left ">
             <button type="button"><span class="glyphicon glyphicon-align-justify"></span></button>
             <div class="dropdown-content pull-left">
                <form action="public.php" method="post">
                    <li><button class="navbar-brand" name>PUBLIC</button></li>
                </form>
                <form action="" method="post">
                </form>
                <form action="" method="post">
                   <li><button class="navbar-brand" name="logout">LOGOUT</button></li>
               </form>
           </div>
       </ul>
   </div>
</div>
</nav>
<!-- NAVBAR CODE END -->

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Twittum feed</h2>
            <h6><?php echo date("Y/m/d") ?></h6>
            <br />
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4">
            <!-- TWEET WRAPPER START -->
            <div class="twt-wrapper">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Tweets from your follows
                    </div>
                    <div class="panel-body">


                       <form action="" method="post">
                        <textarea class="form-control" name="tweetText" placeholder="Enter here for tweet..." rows="5"></textarea>
                        <br />
                        <button class="btn btn-primary btn-sm pull-right" name="postTweet">Tweet</button>
                        <div class="clearfix"></div>
                        <hr />
                    </form>


                    <ul class="media-list">


                        <?php foreach($tweetsList as $result) { ?>


                            <?php   
                            $following = getFollowsByID($userID, $result['f_id']);

                            if($following > 0){

                                $buttonText = 'Unfollow';
                            }else{

                                $buttonText = 'Follow';

                            }

                            ?>


                            <li class="media">

                                <a href="#" class="pull-left">
                                   <form action="" method="post">
                                    <input type="hidden" name="type" value="<?php echo $buttonText; ?>">
                                    <input type="hidden" name="userid" value="<?php echo $result['f_id']; ?>">

                                    <li><input class="btn btn-primary btn-sm pull-right" name="toggle_follow" type="submit" value="<?php echo $buttonText; ?>">
                                    </li>

                                    <?php if($result['u_id'] == $userID) : ?>
                                    <input type="hidden" name="tweet_id" value="<?php echo $result['t_id']; ?>">
                                    <li> <input class="delete-text" name="delete_tweet" type="submit" value="<?php echo 'delete' ?>">
                                    </li>
                                <?php endif; ?>


                            </form> </a> 


                        </a>
                        <div class="media-body">
                            <span class="text-muted pull-right">
                                <small class="text-muted">
                                    <?php 

                                    $time = time() - strtotime($result['created_at']);

                                    if($time < 60){
                                       echo $time . "s";
                                   }
                                   else if($time < 3600){
                                       echo floor($time / 60) . "m";
                                   }
                                   else if($time < 86400){
                                       echo floor($time / 3600) . "h";
                                   }
                                   else {
                                       echo floor($time / 86400) . "d";
                                   }
                                   ?>
                               </small>
                           </span>


                           <form action="" method="post">
                            <strong class="text-success">

                               <strong>
                                <?php 
                                $username = getNameForTweet($result['f_id']); 

                                ?>
                                <input type="hidden" name="visituserid" value="<?php echo $result['f_id']; ?>">

                                <button class="profile_link" name="go_to_profile" type="submit"><?php print_r($username['username']); ?></button>

                            </strong>

                        </strong>

                    </form>

                    <div class="">
                    <div class="">
                        <p>
                         <?php 

                         print_r($result['tweet']);

                         ?>
                         </div>
                         <img src="https://clipartoons.com/wp-content/uploads/2016/01/bird-face-clip-art-free.jpg" alt="" class="img-circle pull-right">
                     </p>


                     



                 </div>
             </div>
             <?php } ?>     

         </li>

     </div>
 </li>

</div>
</li>
</ul>

</div>
</div>
</div>
<!-- TWEET WRAPPER END -->
</div>
</div>
</div>




<!-- REQUIRED SCRIPTS FILES -->
<!-- CORE JQUERY FILE -->
<script data-rocketsrc="assets/js/jquery-1.11.1.js" type="text/rocketscript"></script>
<!-- REQUIRED BOOTSTRAP SCRIPTS -->
<script data-rocketsrc="assets/js/bootstrap.js" type="text/rocketscript"></script>

<script data-rocketsrc="http://www.designbootstrap.com/track/ga.js"  type="text/rocketscript"></script>


</body>



</center>


</body>
</html>

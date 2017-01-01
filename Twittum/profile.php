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
			<form action="public.php" method="post">
			<li><a href="#" class="w3-padding-large w3-theme-d4">Logged in as <?php echo $login_session?></a></li>
			</form>
			<form action="public.php" method="post">
				<li><button class="navbar-brand" name>Public</button></li>
			</form>
			<form action="public.php" method="post">
				<li><button class="navbar-brand" name="logout">Logout</button></li>
			</form>



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
				<div class="w3-container">
					<h4 class="w3-center">My Profile</h4>

					<hr>
					<h4 class="w3-center">Description</h4>
					<p class"w3-center"London">Lorem ipsum dolor sit amet, audire argumentum nam in, his in moderatius efficiantur, ei has dicit animal delicata. </p>

				</div>
			</div>
			<br>

			

			<br>

		

			<br>

		


			
		</div>

		<!-- Middle Column -->
		<div class="w3-col m7">

			<div class="w3-row-padding">
				<div class="w3-col m12">
					<div class="w3-card-2 w3-round w3-white">
						<div class="w3-container w3-padding">
							<form action="" method="post">
								<br>
								<textarea rows="4" cols="60"name="tweetText" placeholder="Enter here for tweet..." rows="5"></textarea>
								<br>

								<div class="clearfix"></div>
								<hr />
								<button name="postTweet" class="w3-btn w3-theme"><i class="fa fa-pencil"></i>  Post</button>
							</form>

						</div>
					</div>
				</div>
			</div>
			<?php foreach($tweetsList as $result) { ?>


				<?php   
				$following = getFollowsByID($userID, $result['f_id']);

				if($following > 0){

					$buttonText = 'Unfollow';
				}else{

					$buttonText = 'Follow';

				}
				$username = getNameForTweet($result['f_id']); 
				?>

				<div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>

					<span class="w3-right w3-opacity"> <span class="text-muted pull-right">
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
					</span></span>
					<form action="" method="post">
                                    <strong>
                                        <?php 
                                        $username = getNameForTweet($result['f_id']); 
                                      
                                        ?>
                                        <input type="hidden" name="visituserid" value="<?php echo $result['f_id']; ?>">
               
                                        <button class="profile_link" name="go_to_profile" type="submit"><?php print_r($username['username']); ?></button>

                                    </strong>

                                </form>
					<hr class="w3-clear">
					<p>
						<?php 

						print_r($result['tweet']);

						?>


					</p>
				</br>
				<div class="w3-row-padding" style="margin:0 -16px">
					<div class="w3-half">

					</div>
					<div class="w3-half">

					</div>
				</div>
				<form action="" method="post">
					<input type="hidden" name="type" value="<?php echo $buttonText; ?>">
					<input type="hidden" name="userid" value="<?php echo $result['f_id']; ?>">

					<input class="w3-btn w3-theme-d2 w3-margin-bottom" name="toggle_follow" type="submit" value="<?php echo $buttonText; ?>">
					<?php if($result['u_id'] == $userID) : ?>
					<input type="hidden" name="tweet_id" value="<?php echo $result['t_id']; ?>">
					<li> <input class="delete-text" name="delete_tweet" type="submit" value="<?php echo 'delete' ?>">
					</li>

				<?php endif; ?>
			</form>
		</div>

		<?php } ?>

		<!-- End Middle Column -->
	</div>

	<!-- Right Column -->
	<div class="w3-col m2">
		<div class="w3-card-2 w3-round w3-white w3-center">
			<div class="w3-container">
				<p>Upcoming Events:</p>

				<p><strong>Holiday</strong></p>
				<p>Friday 15:00</p>
				<p><button class="w3-btn w3-btn-block w3-theme-l4">Info</button></p>
			</div>
		</div>
		<br>

		<!-- End Right Column -->
	</div>

	<!-- End Grid -->
</div>

<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
	<h5>Footer</h5>
</footer>

<footer class="w3-container w3-theme-d5">
	<p>Powered by <a href="http://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>

<script>
// Accordion

</script>

</body>
</html>


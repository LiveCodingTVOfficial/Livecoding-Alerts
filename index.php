<?php

	/* Author: Orhan KALAYCI
		
		Documentation: 
			- Add a CLR Browser to OBS
			- Put This Link According To Your Needs: http://orhankalayci.com/livecodingalerts/?name=sehlor&key=goqGUXdnnhCEd1Uh&width=1920&height=1080
			- Change Name to your livestream name, and key to RSS feed key.
			- Change width and height according to your resolution. ex: 1280x720, 1920x1080 etc.
			- Be done with it.
	*/


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"> 
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<style>
			#holder {
				position: absolute;
				top: 30%;
				left: 40%;
				text-align: center;
				visibility: hidden;
			}
			
			#data {
				font-family: 'Oswald', sans-serif;
				font-size: 48px;
			}
			
			#data .name {
				color: green;
			}
			
		</style>
	</head>
	
	<body>
		<div id="holder">
			<img id="image" src="stance.gif" />
			<div id="data">
				<span class="name"></span> <br />Thanks For Following!
			</div>
			<audio id="audio" src="follow.mp3" />
		</div>
	</body>
	
	<script type="text/javascript">
		
		function CheckForNewFollower() {
			$.get("check.php", { name: '<?php echo $_GET["name"]; ?>', key: '<?php echo $_GET["key"]; ?>', width: <?php echo $_GET["width"]; ?>, height: <?php echo $_GET["height"]; ?> }, function(data) {
				if(data != "") {
					FollowerAlert(data);
				}
			});
		}
		
		function FollowerAlert(name) {
			var audioElement = document.getElementById("audio");
			audioElement.play();
		
			$(".name").html(name);
			$("#holder").css("visibility", "visible");
			setTimeout("Reset()", 5000);
		}
		
		function Reset() {
			$("#holder").css("visibility", "hidden");
		}
		
		setInterval('CheckForNewFollower()', 1000);
		
	</script>
</html>
















<?php 
	include_once 'header.php';
  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<script type="text/javascript" src="../../javascript/nbw-parallax.js"></script>
	<script type="text/javascript" src="../../javascript/jquery.localscroll-1.2.7-min.js"></script>
	<script type="text/javascript" src="../../javascript/jquery.scrollTo-1.4.2-min.js"></script>
	<script type="text/javascript" src="../../javascript/jquery.inview.js"></script>
	<link href="<?php echo base_url(); ?>/css/parallax.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript">
		$(document).ready(function(){
			$('#nav').localScroll();
		})
	</script>
</head>
<body>
	<ul id="nav">
		<li><a href="#intro" title="Next Section"><img src="images/dot.png" alt="Link" /></a></li>
		<li><a href="#second" title="Next Section"><img src="images/dot.png" alt="Link" /></a></li>
		<li><a href="#third" title="Next Section"><img src="images/dot.png" alt="Link" /></a></li>
		<li><a href="#fourth" title="Next Section"><img src="images/dot.png" alt="Link" /></a></li>
		<li><a href="#fifth" title="Next Section"><img src="images/dot.png" alt="Link" /></a></li>
	</ul>

	<div id="intro">
		<div class="story">
			una historia bonita			
		</div>
	</div>

	<div id="second">
		<div class="story">
			<div class="bg"></div>
			Sigue en dos pasos
		</div>
	</div>

	<div id="third">
		<div class="story">
	    	<div class="float-left">
	        	<h2>What Happens When JavaScript is Disabled?</h2>
	            <p>The user gets a slap! Actually, all that jQuery does is moves the backgrounds relative to the position of the scrollbar. Without it, the backgrounds simply stay put and the user would never know they are missing out on the awesome! CSS2 does a good enough job to still make the effect look cool.</p>
	        </div>
	    </div> <!--.story-->
	</div> <!--#third-->

	<div id="fifth">
		<div class="story">
	    	<div class="float-left">
	            <h2>Empty Containers vs CSS3 Multiple Backgrounds</h2>
	            <p><em>This section only works in modern browsers that support multiple backgrounds.</em></p>
	            <p>The Nikebetterworld.com demo uses only CSS2 to create it's parallax effect. It uses empty containers in each section to give the impression of multiple backgrounds, which is the method I used for the image of the trainers. It's actually possible to achieve the same effect using CSS3s multiple backgrounds -- as I've done with the bubbles in this section, although, it will only work in modern browsers that support CSS3 multiple backgrounds.</p>
	            <p>The use of CSS3 means less markup and jQuery, making the script slightly quicker.</p>
	        </div>
	    </div> <!--.story-->
	</div> <!--#fifth-->

	
</body>
</html>
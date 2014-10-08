<?php 
	include_once 'header_intro.php';
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
		<li><a href="#fifth" title="Next Section"><img src="images/dot.png" alt="Link" /></a></li>
	</ul>

	<div id="intro">
		<div class="story">
			<div class="float-left">
				<h1>Job Scope</h1>
			</div>	
		</div>
	</div>

	<div id="second">
		<div class="story">
			<div class="float-right">
				<h2>Basic Idea</h2>
				<p>Are you looking for a job but you hate to look for one?, you have certain skills but you don't find the perfect job for you, don't even tell me about the many hours spent in the computer just to find a job that you actually qualify. Significantly reduce the hours spent with "JOB SCOPE".</p>
			</div>
		</div>
	</div>

	<div id="third">
		<div class="story">
	    	<div class="float-left">
	        	<h2>Got tired of looking and not finding anything?</h2>
	            <p>Remove all frustation with us and try us out, easy to use, in a few steps you can be appplying for the job specially designed for you </p>
	        </div>
	    </div> <!--.story-->
	</div> <!--#third-->

	<div id="fifth">
		<div class="story">
	    	<div class="float-left">
	            <h2>Whant to check us out?</h2>
	            <p><em>Reduce searching hours.</em></p>
	            <p>Free, simple and designed to pair you with the perfect job for you.</p>
	            <p>Come feel free to join us and try us out.</p>
	        </div>
	        <div class="float-right">
	        	<button class="button_par" type="button" style="top: 232px; left: 190px;">Login</button>
	        	<button class="button_par" type="button" style="top: 232px; left: 190px;">Register</button>
	        </div>
	    </div> <!--.story-->
	</div> <!--#fifth-->

	
</body>
</html>
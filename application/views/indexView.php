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
		<li><a href="#intro" title="Next Section"><img src="../../images/dot.png" alt="Link" /></a></li>
		<li><a href="#second" title="Next Section"><img src="../../images/dot.png" alt="Link" /></a></li>
		<li><a href="#third" title="Next Section"><img src="../../images/dot.png" alt="Link" /></a></li>
		<li><a href="#fourth" title="Next Section"><img src="../../images/dot.png" alt="Link" /></a></li>
		<li><a href="#fifth" title="Next Section"><img src="../../images/dot.png" alt="Link" /></a></li>
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

	
</body>
</html>
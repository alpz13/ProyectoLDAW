<?php 
    include_once 'header.php';
    if($this->session->userdata('nombre')) {
        $nombre = $this->session->userdata('nombre');
        $nombre .= " ".$this->session->userdata('apellidoP');
        $nombre .= " ".$this->session->userdata('apellidoM');   
?>

<title>Home</title>
<body class='home'>
    <div id="tooplate_wrapper">
        <div class='menuArea'>
            <?php 
                if($this->session->userdata('tipo') == 3) {
                    include_once 'headWorker.php';
                } else {
                    include_once 'headAdmin.php';
                }
            ?>
        </div>
        <div class="principalArea">
            <div>
                <div id="title"><h2>Bienvenido! <?php echo $nombre; ?></h2></div>
            </div>
            <div id="contentArea">
                <script>
//Script para mostrar y esconder las dos graficas (inicia escondiendo la segunda grafica) 23 de octubre del 2014.
$(document).ready(function(){
$("p2").hide();
  $("#hide").click(function(){
    $("p2").hide();
    $("p1").show();
  });
  
  $("#show").click(function(){
    $("p1").hide();
    $("p2").show();
  });
});
</script>
			<br><hr><br><br>
			<img id="usrProfilePhoto" width="250x250" src="<?php echo base_url(); ?>images/user.png">
			<p1 style="margin-left:5%" id="graph1"><img style="-webkit-user-select:none;" width="35%" src="<?php echo base_url(); ?>lib/graph/radarmarkex1View.php" alt="" ></p1>
			<p2 style="margin-left:5%" id="graph2"><img style="-webkit-user-select:none;" width="35%" src="<?php echo base_url(); ?>lib/graph/radarmarkex2View.php" alt="" ></p2>
			<br/>
				<div style="margin-left:42%">
					<button class="button2" id="hide">Areas</button>
					<button class="button2" id="show">Abilities</button>
				</div>
				<br><hr><br><br>
            </div>
        </div>
    </div>
    <br/><br/><br/>
</body>

<?php
    } else {
        include 'error.php';
    }
?>
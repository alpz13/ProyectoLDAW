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
                include 'headAdmin.php';
            ?>
        </div>
<!--        <div class="displayArea">
            <img id="flecha" src="../../images/flecha.jpg"/>
        </div>-->
        <div class="principalArea">
            <div>
                <div id="title"><h2>Bienvenido! <?php echo $nombre; ?></h2></div>
            </div>
            <div id="contentArea">
                
            </div>
        </div>
    </div>
    <br/><br/><br/>
    <div id='footerid'>
        <div class="footer">
                <?php include_once 'footer.php'; ?>
        </div>
    </div>
</body>

<?php
    } else {
        include 'error.php';
    }
?>
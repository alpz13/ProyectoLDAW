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
                <div id="title"><h2>Welcome! <?php echo $nombre; ?></h2></div>
            </div>
            <div id="contentArea">
                <div>
                    <?php
                        $i = 0;
                        $j=count($proyectosAreas);
                        if($j > 0) {
                            echo "<h2>Proyectos con áreas afines</h2>";
                            for($i; $i < $j; $i++) {
                                foreach($proyectosAreas[$i]->result() as $row) {
                                    echo "Nombre: ".$row->Nombre."<br/>";
                                    echo "Descripcion: ".$row->Descripcion;
                                    echo "<br/><br/>";
                                }
                            }  
                        }
                        
                    ?>
                    <br/><br/>
                    <?php
                        $i = 0;
                        $j=count($proyectosCompetencias);
                        if($j > 0) {
                            echo "<h2>Proyectos con competencias afines</h2>";
                            for($i; $i < $j; $i++) {
                                foreach($proyectosCompetencias[$i]->result() as $row) { 
                                    echo "Nombre: ".$row->Nombre."<br/>";
                                    echo "Descripcion: ".$row->Descripcion;
                                    echo "<br/><br/>";
                                }
                            }
                        }
                        
                    ?>
                </div>
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
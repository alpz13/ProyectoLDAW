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
                <br/><br/><br/><br/><br/>
                <div>
                    <?php
                        $i = 0;
                        $j=count($proyectosAreas);
                        if($j > 0) {
                            echo "<div class='titleProyects' id='proyectosAreas'>";
                                echo "<h2>Proyectos con áreas afines</h2>";
                            echo "</div><br/>";
                            echo "<div>";
                                echo "<table>";
                                    for($i; $i < $j; $i++) {
                                        echo "<tr>";
                                            foreach($proyectosAreas[$i]->result() as $row) {
                                                echo "<td>";
                                                    echo $row->Nombre;
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $row->Descripcion;
                                                echo "</td>";
                                                echo "<td>"; ?>
                                                    <input type='button' value='Send request' onClick="requestProyect(<?php echo $row->idTrabajos;?>)"/>
                                          <?php echo "</td>";
                                            }
                                        echo "</tr>";
                                    }
                                echo "</table>";
                            echo "</div>";
                        }
                        
                    ?>
                    <br/><br/>
                    <?php
                        $i = 0;
                        $j=count($proyectosCompetencias);
                        if($j > 0) {
                            echo "<div class='titleProyects' id='proyectosCompetencias'>";
                                echo "<h2>Proyectos con competencias afines</h2>";
                            echo "</div><br/>";
                             echo "<div>";
                                echo "<table>";
                                    for($i; $i < $j; $i++) {
                                        foreach($proyectosCompetencias[$i]->result() as $row) { 
                                            echo "<td>";
                                                    echo $row->Nombre;
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $row->Descripcion;
                                                echo "</td>";
                                                echo "<td>"; ?>
                                                    <input type='button' value='Send request' onClick="requestProyect(<?php echo $row->idTrabajos;?>)"/>
                                          <?php echo "</td>";
                                            }
                                        echo "</tr>";
                                    }
                                echo "</table>";
                            echo "</div>";
                        }
                        
                    ?>
                </div>
            </div>
        </div>
    </div>
    <br/><br/><br/>
    <input type="hidden" id="url" value="<?php echo base_url(); ?>"/>
</body>

<?php
    } else {
        include 'error.php';
    }
?>
<?php 
    include_once 'header.php';
    if($this->session->userdata('nombre')) {
        $nombre = $this->session->userdata('nombre');
        $nombre .= " ".$this->session->userdata('apellidoP');
        $nombre .= " ".$this->session->userdata('apellidoM');   
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styleJavascript.css" >
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
                <?php 
                if($this->session->userdata('tipo') == 3) { ?>
                    <div>
                        <?php
                        //*******Se muestran los proyectos a los que está actualmente inscrito//*********
                        $cont = count($proyectosUser);
                        $i = 0;
                        if($cont > 0) {
                            echo "<div class='titleProyects' id='proyectosActuales'>";
                                echo "<h2>Actual Projects</h2>";
                            echo "</div><br/>";
                            echo "<div id='divProyectosActuales' class='principalMenus'>";
                                echo "<table>";
                                    for($i; $i < $cont; $i++) {
                                        echo "<tr>";
                                            foreach($proyectosUser[$i]->result() as $row) {
                                                echo "<td class='td'>";
                                                    echo $row->Nombre;
                                                echo "</td>";
                                                echo "<td class='td2'>";
                                                    echo $row->Descripcion;
                                                echo "</td>";
                                                echo "<td>"; ?>
                                                    <input type='button' class="button2" value='See project' onClick="seeProject('<?php echo $row->idTrabajos;?>')"/>
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
                            $j=count($proyectosAreas);
                            if($j > 0) {
                                echo "<div class='titleProyects' id='proyectosAreas'>";
                                    echo "<h2>Same area Projects</h2>";
                                echo "</div><br/>";
                                echo "<div id='divProyectosAreas' class='principalMenus'>";
                                    echo "<table>";
                                        for($i; $i < $j; $i++) {
                                            echo "<tr>";
                                                foreach($proyectosAreas[$i]->result() as $row) {
                                                    echo "<td class='td'>";
                                                        echo $row->Nombre;
                                                    echo "</td>";
                                                    echo "<td class='td2'>";
                                                        echo $row->Descripcion;
                                                    echo "</td>";
                                                    echo "<td>"; ?>
                                                        <input type='button' class="button2" value='Send request' onClick="requestProyect('<?php echo $row->idTrabajos;?>')"/>
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
                                    echo "<h2>Same competence Projects</h2>";
                                echo "</div><br/>";
                                 echo "<div id='divProyectosCompetencias' class='principalMenus'>";
                                    echo "<table>";
                                        for($i; $i < $j; $i++) {
                                            foreach($proyectosCompetencias[$i]->result() as $row) { 
                                                echo "<td class='td'>";
                                                        echo $row->Nombre;
                                                    echo "</td>";
                                                    echo "<td class='td2'>";
                                                        echo $row->Descripcion;
                                                    echo "</td>";
                                                    echo "<td>"; ?>
                                                        <input type='button' class="button2" value='Send request' onClick="requestProyect(<?php echo $row->idTrabajos;?>)"/>
                                              <?php echo "</td>";
                                                }
                                            echo "</tr>";
                                        }
                                    echo "</table>";
                                echo "</div>";
                            }

                        ?>
                    <br/><br/>
                    </div>
                <?php } else if($this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 2) { 
                            $j = count($requests);
                            if($j > 0) {
                                echo form_open('proyectosController/seeRequest');
                                    echo "<div id='requests' class='principalMenus'>";
                                        echo "<table>";
                                            echo "<tr>";
                                                echo "<td>";
                                                    echo "<span>You have new proyects request!</span>";
                                                echo "</td>";
                                                echo "<td>"; ?>
                                                    <input type="submit" class="button2" value="See requests"/>
                                                    <?php $row = $requests->row(); ?>
                                                    <input type="hidden" name="idSupervisor" value="<?php echo $row->idSupervisor; ?>"/>
                                          <?php echo "</td>";
                                            echo "</tr>";
                                        echo "</table>";
                                    echo "</div>";
                                echo form_close();
                            }
                ?>
                            <div id="seeRequests">
                                
                            </div>
                <?php } ?>
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
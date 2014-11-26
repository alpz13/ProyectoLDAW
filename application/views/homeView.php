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
        <div class="principalArea" style="margin-left:13%; margin-right:13%">
            <div class="overlay-container">
                <div id="searchValues" class="window-container zoomin">
                    
                </div>
            </div>
            <br/>
            <div id="takeTest">
                <?php 
                    if($this->session->userdata('test') == 0) {
                        echo form_open('usuarioscontroller/takeTest');
                            echo '<div style="text-align:center">';
                            echo '<label>Please take a minutes to take the competence test</label>';
                                echo '<br/>';
                                echo '<input type="hidden" name="idUsuario" value="'.$this->session->userdata('id').'"/>';
                               echo '<input type="submit" class="btn btn-success" value="Take test" style="cursor: pointer"/>';
                            echo '</div>';
                        echo form_close();
                    }
                ?>
            </div>
            <div id="takeTestCompetences">
                <?php 
                    if($this->session->userdata('test') == 1) {
                        echo form_open('usuarioscontroller/takeTestCompetences');
                            echo '<div style="text-align:center">';
                                echo '<label>Please take a minutes to take the competence test</label>';
                                echo '<br/>';
                                echo '<input type="hidden" name="idUsuario" value="'.$this->session->userdata('id').'"/>';
                               echo '<input type="submit" class="btn btn-success" value="Take test" style="cursor: pointer"/>';
                            echo '</div>';
                        echo form_close();
                    }
                ?>
            </div>
            <br/>
            <div id="contentArea" style="text-align: center">
                <?php 
                if($this->session->userdata('tipo') == 3) { ?>
                    <div>
                        <?php
                        //*******Se muestran los proyectos a los que est繝ｻ繝ｻ・ｽ・｡ actualmente inscrito//*********
                        $cont = count($proyectosUser);
                        $i = 0;
                        if($cont > 0) {
                            echo "<div class='titleProyects' id='proyectosActuales'>";
                                echo "<h2>Actual Projects</h2>";
                            echo "</div>";
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

                                                    <input type='button' class="btn btn-primary" value='See project' onClick="seeProject('<?php echo $row->idTrabajos;?>')"/>

                                                    <!--<input type='button' class="button2" value='See project' name="projectButton" ident='<?php echo $row->idTrabajos; ?>' data-type="zoomin"/>
>>>>>>> 417398a409c885a5e9d99853441ff1e23567f65c-->
                                          <?php echo "</td>";
                                            }
                                        echo "</tr>";
                                    }
                                echo "</table>";
                            echo "</div>";
                        }
                        ?>
                        
                        <?php
                            $i = 0;
                            $j=count($proyectosAreas);
                            if($j > 0) {
                            echo"<br/>";
                                echo "<div class='titleProyects' id='proyectosAreas'>";
                                ?>
                                <h3><img src="<?php echo base_url(); ?>images/folder-logo_opt.png" alt="logos"/>Same area Projects</h3><h4>(Click to expand)</h4>
                                <?php
                                    //echo "<h2>Same area Projects</h2><h3>(Click to expand)</h3>";
                                echo "</div><br/>";
                                echo "<div id='divProyectosAreas' class='principalMenus'>";
                                    echo '<table class="table table-bordered table-hover table-striped">';
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
                                                        <input type='button' class="btn btn-success" value='Send request' onClick="requestProyect('<?php echo $row->idTrabajos;?>')"/>
                                              <?php echo "</td>";
                                                }
                                            echo "</tr>";
                                        }
                                    echo "</table>";
                                echo "</div>";
                                echo"<br/><br/>";
                            }

                        ?>
                        
                        <?php
                            $i = 0;
                            $j=count($proyectosCompetencias);
                            if($j > 0) {
                            
                                echo "<div class='titleProyects' id='proyectosCompetencias'>";
                                 ?>
                                <h3><img src="<?php echo base_url(); ?>images/folder-logo_opt.png" alt="logos"/>Same competence Projects</h3><h4>(Click to expand)</h4>
                                <?php
                                    //echo "<h2>Same competence Projects</h2><h3>(Click to expand)</h3>";
                                echo "</div><br/>";
                                 echo "<div id='divProyectosCompetencias' class='principalMenus'>";
                                    echo '<table class="table table-bordered table-hover table-striped">';
                                        for($i; $i < $j; $i++) {
                                            foreach($proyectosCompetencias[$i]->result() as $row) { 
                                                echo "<td>";
                                                        echo $row->Nombre;
                                                    echo "</td>";
                                                    echo "<td>";
                                                        echo $row->Descripcion;
                                                    echo "</td>";
                                                    echo "<td>"; ?>
                                                        <input type='button' class="btn btn-success" value='Send request' onClick="requestProyect(<?php echo $row->idTrabajos;?>)"/>
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
                    if(isset($requests)) {
                        $j = count($requests);
                        if($j > 0) {
                            echo form_open('proyectoscontroller/seeRequest');
                                echo "<div id='requests' class='principalMenus'>";
                                    ?>
                                    <table style="margin-left:33%">;
                                    <?php
                                        echo "<tr>";
                                            echo "<td class='td'>";
                                                ?>
                                                <span><img src="<?php echo base_url(); ?>images/00442128_opt.png" alt="logos"/>You have new projects request. </span>
                                                <?php
                                            echo "</td>";
                                            echo "<td>"; ?>
                                                <input type="submit" class="btn btn-success" value="See requests"/>
                                                <?php $row = $requests->row(); ?>
                                                <input type="hidden" name="idSupervisor" value="<?php echo $row->idSupervisor; ?>"/>
                                      <?php echo "</td>";
                                        echo "</tr>";
                                    echo "</table>";
                                echo "</div>";
                            echo form_close();
                        }
                    } else {
                        ?>
                                                <div>
                                                    <br/>
                                                    <table style="margin-left:35%">
                                                        <tr>
                                                            <td>
                                                                <span class="alert alert-info" role="alert"><img src="<?php echo base_url(); ?>images/00442128_opt.png" alt="logos"/>You don't have any pending request. </span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                        <?php
                    }
                ?>
                            <div id="seeRequests">
                                
                            </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <input type="hidden" id="url" value="<?php echo base_url(); ?>"/>
</body>

<?php
    } else {
        include 'error.php';
    }
?>
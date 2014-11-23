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
                <div>
                    <?php echo form_open("buscarController/searchAll"); ?>
                    <input type="hidden" name="urlBuscar" value="<?php echo base_url(); ?>"/>
                    <input type="search" name="buscar" id="buscar" class="busqueda"/>
                    <!--<input type="submit" value="Buscar" style="border-style: none; background: url('<?php echo base_url(); ?>images/search.gif') no-repeat; width: 24px; height: 20px;">-->
                    <input type="submit" value="Search"/>
                <?php echo form_close();?>
                </div>
            </div>
            <div class="overlay-container">
                <div id="searchValues" class="window-container zoomin">
                    
                </div>
            </div>
            <div id="contentArea">
                <br/><br/><br/><br/><br/>
                <?php 
                if($this->session->userdata('tipo') == 3) { ?>
                    <div>
                        <?php
                        //*******Se muestran los proyectos a los que estﾃ｡ actualmente inscrito//*********
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
                                                    <input type='button' class="button2" value='See project' name="projectButton" ident='<?php echo $row->idTrabajos; ?>' data-type="zoomin"/>
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
                            echo"<hr/><br/>";
                                echo "<div class='titleProyects' id='proyectosAreas'>";
                                ?>
                                <h2><img src="<?php echo base_url(); ?>images/folder-logo_opt.png" alt="logos"/>Same area Projects</h2><h3>(Click to expand)</h3>
                                <?php
                                    //echo "<h2>Same area Projects</h2><h3>(Click to expand)</h3>";
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
                                echo"<br/><hr/><br/>";
                            }

                        ?>
                        <br/><br/>
                        <?php
                            $i = 0;
                            $j=count($proyectosCompetencias);
                            if($j > 0) {
                            echo"<hr/><br/>";
                                echo "<div class='titleProyects' id='proyectosCompetencias'>";
                                 ?>
                                <h2><img src="<?php echo base_url(); ?>images/folder-logo_opt.png" alt="logos"/>Same area Projects</h2><h3>(Click to expand)</h3>
                                <?php
                                    //echo "<h2>Same competence Projects</h2><h3>(Click to expand)</h3>";
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
                                echo"<br/><hr/><br/>";
                            }

                        ?>
                    <br/><br/>
                    </div>
                <?php } else if($this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 2) { 
                    if(isset($requests)) {
                        $j = count($requests);
                        if($j > 0) {
                            echo form_open('proyectosController/seeRequest');
                                echo "<div id='requests' class='principalMenus'>";
                                    ?>
                                    <table style="margin-left:30%">;
                                    <?php
                                        echo "<tr>";
                                            echo "<td class='td'>";
                                                ?>
                                                <span><img src="<?php echo base_url(); ?>images/00442128_opt.png" alt="logos"/>You have new projects request. </span>
                                                <?php
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
                    } else {
                        ?>
                                                <div class="principalMenus">
                                                    <table style="margin-left:30%">
                                                        <tr>
                                                            <td class='td'>
                                                                <span><img src="<?php echo base_url(); ?>images/00442128_opt.png" alt="logos"/>You don't have any pending request. </span>
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
    <br/><br/><br/>
    <input type="hidden" id="url" value="<?php echo base_url(); ?>"/>
</body>

<?php
    } else {
        include 'error.php';
    }
?>
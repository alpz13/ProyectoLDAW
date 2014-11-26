<?php 
    include_once 'header.php';
    if($this->session->userdata('nombre')) {
        $nombre = $this->session->userdata('nombre');
        $nombre .= " ".$this->session->userdata('apellidoP');
        $nombre .= " ".$this->session->userdata('apellidoM');   
?>

<title>Create Project</title>
<body class='home'>
    <div id="tooplate_wrapper">
        <div class="menuArea">
            <?php 
                if($this->session->userdata('tipo') == 3) {
                    include_once 'headWorker.php';
                } else {
                    include_once 'headAdmin.php';
                }
            ?>
        </div>
        <div class="principalAreaP dark">
            <table style="margin-left: 14%;">
                <tr>
                    <td>
                        <?php echo form_open('proyectoscontroller/myProjects'); ?>
                            <input class="btn btn-primary" type="submit" value="My Projects" />
                        <?php echo form_close(); ?>
                    </td>
                    <td>
                        <?php echo form_open('proyectoscontroller/consultar'); ?>
                            <input class="btn btn-primary" type="submit" value="See all projects" />
                        <?php echo form_close(); ?>
                    </td>
                    <td>
                        <?php echo form_open('proyectoscontroller/creaProyecto'); ?>
                            <input class="btn btn-primary" type="submit" value="Create project"/>
                        <?php echo form_close(); ?>
                    </td>
                    <td>
                        <?php echo form_open('proyectoscontroller/asignarTrabajador'); ?>
                            <input class="btn btn-primary" type="submit" value="Assign worker"/>
                        <?php echo form_close(); ?>
                    </td>
                    <td>
                        <?php echo form_open('proyectoscontroller/eliminar'); ?>
                            <input class="btn btn-primary" type="submit" value="Delete project" />
                        <?php echo form_close(); ?>
                    </td>
                </tr>
            </table>
        </div><br/><br/>
        <div id="msgUpdate" style="display: none"></div>
        <input type="hidden" id="url" value="<?php echo base_url();?>"/>
    <div>
        <?php
            if(isset($project)) { 
                echo form_open("proyectoscontroller/updateProject");
                echo "<table>";
                    foreach($project->result() as $row) {
                        echo "<tr><td><input type='hidden' id='idProyecto' value='".$row->idTrabajos."'/>";
                        echo "<tr>";
                            echo "<td>";
                                echo "Name of project:";
                            echo "</td>";
                            echo "<td>";
                                echo '<input type="text" name="nombre" id="nombre" value="'.$row->Nombre.'"/>';
                            echo "</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>";
                                echo "Description:";
                            echo "</td>";
                            echo "<td>";
                                echo '<textarea id="descripcion" rows="5" cols="70">'.$row->Descripcion.'</textarea>';
                            echo "</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>";
                                echo "Availability:";
                            echo "</td>";
                            echo "<td>";
                                if($row->Habilitado == 1) {
                                    echo '<label>Enable: </label><input type="radio" name="habilitado" id="habilitado" value="1" checked="true"/>';
                                    echo '<label>Disable: </label><input type="radio" name="habilitado" id="deshabilitado" value="0"/>';
                                } else {
                                    echo '<label>Enable: </label><input type="radio" name="habilitado" id="habilitado" value="1"/>';
                                    echo '<label>Disable: </label><input type="radio" name="habilitado" id="deshabilitado" value="0"  checked="true"/>';
                                }
                            echo "</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>";
                                echo "<strong>Areas:</strong><br/>
                                        Security: <br/>
                                        Web: <br/>
                                        DataBases: <br/>
                                        Networking: <br/>
                                        DesktopApps: <br/>";
                                echo "</td>";
                            echo "<td>";
                                echo '<br/>';
                                if(isset($califArea)) {
                                    $areas = $califArea->result();
                                    $dataAreas = array();
                                    $i = 1;
                                    foreach($areas as $row) {
                                        $actual = $row->idArea;
                                        if($actual > $i) {
                                            for($i; $i < $actual; $i++) {
                                                $dataAreas[$i] = 0;
                                            }
                                            $dataAreas[$i] = $actual;
                                        } elseif($actual == $i) {
                                            $dataAreas[$i] = $actual;
                                        }
                                        $i++;
                                    }
                                    if($i <= 5) {
                                        for($i; $i <= 5; $i++) {
                                            $dataAreas[$i] = 0;
                                        }
                                    }
                                    if($dataAreas[1] != 0) {
                                        echo '<input type="checkbox" name="security" value="1" checked/><br/>';
                                    } else {
                                        echo '<input type="checkbox" name="security" value="1"/><br/>';
                                    }
                                    if($dataAreas[2] != 0) {
                                        echo '<input type="checkbox" name="web" value="2" checked/><br/>';
                                    } else {
                                        echo '<input type="checkbox" name="web" value="2"/><br/>';
                                    }
                                    if($dataAreas[3] != 0) {
                                        echo '<input type="checkbox" name="db" value="3" checked/><br/>';
                                    } else {
                                        echo '<input type="checkbox" name="db" value="3"/><br/>';
                                    }
                                    if($dataAreas[4] != 0) {
                                        echo '<input type="checkbox" name="network" value="4" checked/><br/>';
                                    } else {
                                        echo '<input type="checkbox" name="network" value="4"/><br/>';
                                    }
                                    if($dataAreas[5] != 0) {
                                        echo '<input type="checkbox" name="desktop" value="5" checked/><br/>';
                                    } else {
                                        echo '<input type="checkbox" name="desktop" value="5"/><br/>';
                                    }
                                } else {
                                    echo '<input type="checkbox" name="security" value="1"/><br/>';
                                    echo '<input type="checkbox" name="web" value="2"/><br/>';
                                    echo '<input type="checkbox" name="db" value="3"/><br/>';
                                    echo '<input type="checkbox" name="network" value="4"/><br/>';
                                    echo '<input type="checkbox" name="desktop" value="5"/><br/>';
                                }
                            echo "</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>";
                                echo "<strong>Competences:</strong><br/>
                                        Team Work: <br/>
                                        Comunication: <br/>
                                        Work under pressure: <br/>
                                        Initiative: <br/>
                                        Leadership: <br/>";
                            echo "</td>";
                            echo "<td>";
                                echo "<br/>";
                                //**Aqui va lo mismo pero para competencias
                                if(isset($califCompetence)) {
                                    $areas = $califCompetence->result();
                                    $dataCompetence = array();
                                    $i = 1;
                                    foreach($areas as $row) {
                                        $actual = $row->idCompetencias;
                                        if($actual > $i) {
                                            for($i; $i < $actual; $i++) {
                                                $dataCompetence[$i] = 0;
                                            }
                                            $dataCompetence[$i] = $actual;
                                        } elseif($actual == $i) {
                                            $dataCompetence[$i] = $actual;
                                        }
                                        $i++;
                                    }
                                    
                                    if($i <= 5) {
                                        for($i; $i <= 5; $i++) {
                                            $dataCompetence[$i] = 0;
                                        }
                                    }
                                    if($dataCompetence[1] != 0) {
                                        echo '<input type="checkbox" name="team" value="1" checked/><br/>';
                                    } else {
                                        echo '<input type="checkbox" name="team" value="1"/><br/>';
                                    }
                                    if($dataCompetence[2] != 0) {
                                        echo '<input type="checkbox" name="comunication" value="2" checked/><br/>';
                                    } else {
                                        echo '<input type="checkbox" name="comunication" value="2"/><br/>';
                                    }
                                    if($dataCompetence[3] != 0) {
                                        echo '<input type="checkbox" name="work" value="3" checked/><br/>';
                                    } else {
                                        echo '<input type="checkbox" name="work" value="3"/><br/>';
                                    }
                                    if($dataCompetence[4] != 0) {
                                        echo '<input type="checkbox" name="initiative" value="4" checked/><br/>';
                                    } else {
                                        echo '<input type="checkbox" name="initiative" value="4"/><br/>';
                                    }
                                    if($dataCompetence[5] != 0) {
                                        echo '<input type="checkbox" name="leader" value="5" checked/><br/>';
                                    } else {
                                        echo '<input type="checkbox" name="leader" value="5"/><br/>';
                                    }
                                } else {
                                    echo '<input type="checkbox" name="team" value="1"/><br/>';
                                    echo '<input type="checkbox" name="comunication" value="2"/><br/>';
                                    echo '<input type="checkbox" name="work" value="3"/><br/>';
                                    echo '<input type="checkbox" name="initiative" value="4"/><br/>';
                                    echo '<input type="checkbox" name="leader" value="5"/><br/>';
                                }
                            echo "</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td></td>";
                            echo "<td>";
                                echo "<input type='button' id='updateButton' value='Update'/> &nbsp;";
                                echo "<input type='button' id='cancelButton' onclick='javascript:window.history.back();' value='Cancel'/>";
                            echo "</td>";
                        echo "</tr>";
                    }
                echo "</table>";
            } else if(isset ($error1)) {
                echo "<span>".$error1."</span>";
            }
        ?>
    </div>
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
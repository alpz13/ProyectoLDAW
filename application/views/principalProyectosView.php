<?php 
    include_once 'header.php';
    if($this->session->userdata('nombre')) {
        $nombre = $this->session->userdata('nombre');
        $nombre .= " ".$this->session->userdata('apellidoP');
        $nombre .= " ".$this->session->userdata('apellidoM');   
?>

<title>Proyectos</title>
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
            <?php if($this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 2 ) { ?>
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
            <?php } else {?>
                <table style="margin-left: 40%;">
                    <tr>
                        <td>
                            <?php echo form_open('proyectoscontroller/consultar'); ?>
                                <input class="btn btn-primary" type="submit" value="Consulta proyectos" />
                            <?php echo form_close(); ?>
                        </td>
                    </tr>
                </table>
            <?php } ?>
        </div><br/><br/>
        <div id="contenido" style="display: none"></div>
        <div class="overlay-container">
                <div id="searchValues" class="window-container zoomin">
                    
                </div>
        </div>
        <?php if(isset($myProjects)) { ?>
                <div id="projects">
                    <input type="hidden" id="url" value="<?php echo base_url(); ?>" />
                    <?php
                    echo "<table>";
                        echo "<tr>";
                            echo "<td>";
                                echo "<strong>Name</strong>";
                            echo "</td>";
                            echo "<td>";
                                echo "<strong>Description</strong>";
                            echo "</td>";
                        echo "</tr>";
                        foreach($myProjects->result() as $row) {
                            echo "<tr>";
                                echo "<td>";
                                    echo $row->Nombre;
                                echo "</td>";
                                echo "<td>";
                                    echo $row->Descripcion;
                                echo "</td>";
                                echo "<td>";
                                    echo form_open('proyectoscontroller/getProyectModify');
                                        echo "<input type='hidden' name='idProyecto' value=".$row->idTrabajos.'"/>';
                                        echo "<input type='submit' value='Modify'/>";
                                    echo form_close();
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='button' name='deleteProject' ident='".$row->idTrabajos."' value='Delete'/>";
                                echo "</td>";
                                echo '<td>';
                                    echo '<input type="button" name="gradeWorkers" ident="'.$row->idTrabajos.'" value="Grade" data-type="zoomin"/>';
                                echo '</td>';
                            echo "</tr>";
                        }
                    echo "</table>";
                    ?>
                </div>
                <div id="modificar">
                    
                </div>
        <?php } ?>
        <div class="result">
            <?php 
                if(isset($success)) {
                    echo "<div class='success'><h2>".$success."</h2></div>";
                }
                if(isset($error)) {
                    echo "<div class='error'><h2>".$error."</h2></div>";
                }
            ?>
        </div>
    </div>
    <br/><br/><br/>
</body>

<?php
    } else {
        include 'error.php';
    }
?>
    




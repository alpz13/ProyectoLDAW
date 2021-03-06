<?php 
    include 'header.php';
    if($this->session->userdata('nombre')) {
        $nombre = $this->session->userdata('nombre');
        $nombre .= " ".$this->session->userdata('apellidoP');
        $nombre .= " ".$this->session->userdata('apellidoM');   
?>

<title>Show Project</title>
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
                <table style="margin-left: 30%;">
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
        </div><br/>
        <div class="principalAreaP dark principalMostrarP" style="margin-left:13%; margin-right:13%">
            <?php if(isset($proyectos)) { 
                $j = count($usersProyectos);
                $i = 0;
                echo "<div class='resultados'>";
                    foreach($proyectos->result() as $row) {
                        $rowU = $usersProyectos[$i]->row();
                        echo '<table class="table table-bordered table-hover table-striped">';
                            echo "<tr class='success'>";
                                echo "<td>";
                                    echo "<strong>".$row->Nombre."</strong><br/><br/>";
                                echo "</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td>";
                                    echo $row->Descripcion."<br/><br/>";
                                echo "</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td>";
                                    echo "<strong>Supervisor: </strong>".$rowU->Nombre." ".$rowU->APaterno." ".$rowU->AMaterno;
                                echo "</td>";
                            echo "</tr>";
                        echo "</table>";
                        echo "<br/>";
                        $i++;
                    }
                echo "</div>";
            ?>
            <?php } else {
                echo "<h3>No hay proyectos disponibles</h3>";
            } ?>
            <br/>
        </div>
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
    
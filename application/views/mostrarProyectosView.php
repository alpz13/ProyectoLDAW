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
                <table style="margin-left: 14%;">
                    <tr>
                        <td>
                            <?php echo form_open('proyectosController/consultar'); ?>
                                <input class="button2" type="submit" value="See all projects" />
                            <?php echo form_close(); ?>
                        </td>
                        <td>
                            <?php echo form_open('proyectosController/creaProyecto'); ?>
                                <input class="button2" type="submit" value="Create project"/>
                            <?php echo form_close(); ?>
                        </td>
                        <td>
                            <?php echo form_open('proyectosController/asignarTrabajador'); ?>
                                <input class="button2" type="submit" value="Assign worker"/>
                            <?php echo form_close(); ?>
                        </td>
                        <td>
                            <?php echo form_open('proyectosController/eliminar'); ?>
                                <input class="button2" type="submit" value="Delete project" />
                            <?php echo form_close(); ?>
                        </td>
                    </tr>
                </table>
            <?php } else {?>
                <table style="margin-left: 40%;">
                    <tr>
                        <td>
                            <?php echo form_open('proyectosController/consultar'); ?>
                                <input class="button2" type="submit" value="Consulta proyectos" />
                            <?php echo form_close(); ?>
                        </td>
                    </tr>
                </table>
            <?php } ?>
        </div><br/>
        <div class="principalAreaP dark principalMostrarP">
            <?php if(isset($proyectos)) { 
                $j = count($usersProyectos);
                $i = 0;
                echo "<div class='resultados'>";
                    foreach($proyectos->result() as $row) {
                        $rowU = $usersProyectos[$i]->row();
                        echo "<table class='table_message'>";
                            echo "<tr>";
                                echo "<td class='nombre'>";
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
    
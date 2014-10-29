<?php 
    include_once 'header.php';
    if($this->session->userdata('nombre')) {
        $nombre = $this->session->userdata('nombre');
        $nombre .= " ".$this->session->userdata('apellidoP');
        $nombre .= " ".$this->session->userdata('apellidoM');   
?>

<title>Delete Project</title>
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
                        <?php echo form_open('proyectosController/consultar'); ?>
                            <input class="button2" type="submit" value="Consulta proyectos" />
                        <?php echo form_close(); ?>
                    </td>
                    <td>
                        <?php echo form_open('proyectosController/creaProyecto'); ?>
                            <input class="button2" type="submit" value="Crear proyecto"/>
                        <?php echo form_close(); ?>
                    </td>
                    <td>
                        <?php echo form_open('proyectosController/asignarTrabajador'); ?>
                            <input class="button2" type="submit" value="Asignar trabajador"/>
                        <?php echo form_close(); ?>
                    </td>
                    <td>
                        <?php echo form_open('proyectosController/eliminar'); ?>
                            <input class="button2" type="submit" value="Eliminar proyecto" />
                        <?php echo form_close(); ?>
                    </td>
                </tr>
            </table>
        </div><br/><br/>
        <div id="mostrarProyectosE">
            <input type="hidden" id="urlProyectosE" value="<?php echo base_url(); ?>"/>
            <select id="proyectosSelect" style="margin-left: 33%;">
                <option value="">Choose a project</option>
                <?php 
                    if($proyectos->num_rows() > 0) {
                        foreach($proyectos->result() as $row) {
                            echo "<option value='".$row->idTrabajos."'>".$row->NombreTrabajo."</option>";
                        }
                    }
                ?>
            </select>
        </div><br/>
        <br/>
        <div id="contenido">
            
        </div><br/><br/>
        <div id="divButtonEliminar">
            <input class="button2" type="button" id="eliminarButtonP" value="Eliminar" style="margin-left: 44%;"/>
        </div>
    </div><br/><br/>
    <div style="margin-left: 33%;">
        <?php if(isset($error)) {
            echo "<p>".$error."</p>";
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
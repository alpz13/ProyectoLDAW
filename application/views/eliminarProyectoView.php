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
        </div><br/><br/>
        <div id="mostrarProyectosE" style="margin-left:13%; margin-right:13%; text-align: center">
            <input type="hidden" id="urlProyectosE" value="<?php echo base_url(); ?>"/>
            <select id="proyectosSelect">
                <option value="">Choose a project</option>
                <?php 
                    if($proyectos->num_rows() > 0) {
                        foreach($proyectos->result() as $row) {
                            echo "<option value='".$row->idTrabajos."'>".$row->Nombre."</option>";
                        }
                    }
                ?>
            </select>
        </div><br/>
        <br/>
        <div id="contenido" style="margin-left:13%; margin-right:13%; text-align: center">
            
        </div>
        <div id="divButtonEliminar" style="text-align: center">
            <input class="btn btn-danger" type="button" id="eliminarButtonP" value="Delete"/>
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
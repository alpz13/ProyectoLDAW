<?php 
    include 'header.php';
    if($this->session->userdata('nombre')) {
        $nombre = $this->session->userdata('nombre');
        $nombre .= " ".$this->session->userdata('apellidoP');
        $nombre .= " ".$this->session->userdata('apellidoM');   
?>

<title>Assign projecr</title>
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
                            <input type="hidden" id="urlProyectos" value="<?php echo base_url(); ?>"/>
                            <input class="button2" type="submit" value="Delete project" />
                        <?php echo form_close(); ?>
                    </td>
                </tr>
            </table>
        </div><br/><br/>
        <div class="principalAreaP dark principalTrabajadores">
            <?php echo form_open('proyectosController/asignarProyecto'); ?>
                <table style="margin-left: 20%">
                    <tr>
                        <td>
                            <?php if(isset($trabajos)) { ?>
                                <select name='proyecto'>
                                    <option value=''>Choose a project</option>
                                    <?php
                                        foreach($trabajos->result() as $row) {
                                            echo "<option value='".$row->idTrabajos."'>".$row->Nombre."</option>";
                                        }
                                    ?>
                                </select>
                            <?php } else {

                            }
                            ?>
                        </td>
                        <td>
                            <?php if(isset($trabajador)) { ?>
                                <select name='trabajador'>
                                    <option value="">Choose a worker</option>
                                    <?php
                                        foreach($trabajador->result() as $row) {
                                            if($row->idUsuarios != $this->session->userdata('id')) {
                                                echo "<option value='".$row->idUsuarios."'>".$row->Nombre." ".$row->APaterno." ".$row->AMaterno."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            <?php } else {
                                echo "<p>There are no workers assigned</p>";
                            }
                            ?>
                        </td>
                    </tr>
                </table><br/>
                <input class="button2" type='submit' value='Assign' style="margin-left: 43%"/>
            <?php echo form_close(); ?>
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
    
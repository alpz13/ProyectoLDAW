<?php 
    include 'header.php';
    if($this->session->userdata('nombre')) {
        $nombre = $this->session->userdata('nombre');
        $nombre .= " ".$this->session->userdata('apellidoP');
        $nombre .= " ".$this->session->userdata('apellidoM');   
?>

<title>Asignar proyectos</title>
<body class='home'>
    <div id="tooplate_wrapper">
        <div class="menuArea">
            <?php 
                include 'headAdmin.php';
            ?>
        </div>
        <div class="principalArea">
            <div>
                <div id="title"><h2>Bienvenido! <?php echo $nombre; ?></h2></div>
            </div>
            <div id="contentArea">
                
            </div>
        </div>
        <div class="principalAreaP dark principalTrabajadores">
            <?php echo form_open('proyectosController/asignarProyecto'); ?>
                <table>
                    <tr>
                        <td>
                            <?php if(isset($trabajos)) { ?>
                                <select name='proyecto'>
                                    <option value=''>Selecciona un proyecto</option>
                                    <?php
                                        foreach($trabajos->result() as $row) {
                                            echo "<option value='".$row->idTrabajos."'>".$row->NombreTrabajo."</option>";
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
                                    <option value="">Selecciona un trabajador</option>
                                    <?php
                                        foreach($trabajador->result() as $row) {
                                            echo "<option value='".$row->idUsuarios."'>".$row->Nombre." ".$row->APaterno." ".$row->AMaterno."</option>";
                                        }
                                    ?>
                                </select>
                            <?php } else {

                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type='submit' value='Asignar'/></td>
                    </tr>
                </table>
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
    
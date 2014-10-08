<?php 
    include_once 'header.php';
    if($this->session->userdata('nombre')) {
        $nombre = $this->session->userdata('nombre');
        $nombre .= " ".$this->session->userdata('apellidoP');
        $nombre .= " ".$this->session->userdata('apellidoM');   
?>

<title>Crea proyecto</title>
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
        <div class="principalAreaP dark">
            <?php echo form_open('proyectosController/nuevoProyecto'); ?>
                <table style="margin-left: 20%;">
                    <tr>
                        <td>Nombre de proyecto: </td>
                        <td><input type="text" name="nombre" value="<?php echo set_value('nombre');?>"/></td>
                    </tr>
                    <tr>
                        <td>Descripción: </td>
                        <td><textarea name="descripcion" rows="5" cols="70" ><?php echo set_value('descripcion');?></textarea></td>
                    </tr>
                    <tr>
                        <td>Disponibilidad: </td>
                        <td>
                            <label>Habilitado: </label><input type="radio" name="habilitado" value="1" checked="true"/>
                            <label>Deshabilitado: </label><input type="radio" name="habilitado" value="0"/>
                        </td>
                    </tr>
                </table>
            <br/>
            <input class="button2" type="submit" value="Crear proyecto" style="margin-left: 20%;"/>
            <?php echo form_close(); ?>
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
    
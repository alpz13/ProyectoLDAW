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
                include 'headAdmin.php';
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
                            <input type="hidden" id="urlProyectos" value="<?php echo base_url(); ?>"/>
                            <input class="button2" type="submit" value="Eliminar proyecto" />
                        <?php echo form_close(); ?>
                    </td>
                </tr>
            </table>
        </div><br/><br/>
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
    




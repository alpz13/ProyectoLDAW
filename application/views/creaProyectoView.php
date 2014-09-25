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
        <div class="principalAreaP dark">
            <?php echo form_open('proyectosController/nuevoProyecto'); ?>
                <table>
                    <tr>
                        <td>Nombre de proyecto: </td>
                        <td><input type="text" name="nombre"/></td>
                    </tr>
                    <tr>
                        <td>Descripción: </td>
                        <td><textarea name="descripcion" rows="5" cols="70"></textarea></td>
                    </tr>
                    <tr>
                        <td>Disponibilidad: </td>
                        <td>
                            <label>Habilitado: </label><input type="radio" name="habilitado" value="1"/>
                            <label>Deshabilitado: </label><input type="radio" name="habilitado" value="0"/>
                        </td>
                    </tr>
                </table>
            <input type="submit" value="Crear proyecto"/>
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
    
<!DOCTYPE>
<html>
    <head>
        <title>Configuración</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="home">
        <div>
            
        </div>
        <?php include ('header.php'); ?>
        <div id="tooplate_wrapper">
            <div class='menuArea'>
                <?php 
                    if($this->session->userdata('tipo') == 3) {
                        include_once 'headWorker.php';
                    } else {
                        include_once 'headAdmin.php';
                    }
                ?>
            </div>
        </div>
        <div>
            <form style="margin-left: 31%">
                <table>
                    <tr>
                        <td>Nombre: </td>
                        <td><input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Apellido Paterno: </td>
                        <td><input type="text" name="aPaterno" id="aPaterno" value="<?php echo $aPaterno; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Apellido Materno: </td>
                        <td><input type="text" name="aMaterno" id="aMaterno" value="<?php echo $aMaterno; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Contraseña: </td>
                        <td><input type="password" name="pass" id="pass" value="<?php echo $pass; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Confirmación: </td>
                        <td><input type="password" name="passCon" id="passCon"/></td>
                    </tr>
                    <tr>
                        <td>Correo: </td>
                        <td><input type="text" name="mail" id="mail" value="<?php echo $mail; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Foto: </td>
                        <td><input type="text" name="urlFoto" id="urlFoto" value="<?php echo $foto; ?>"/></td>
                    </tr>
                    <tr>
                        <td><br/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="button" class="button2" id="enviarConfigurar" value="Actualizar"/></td>
                    </tr>
                </table>
            <input type="hidden" id="url" value="<?php echo base_url(); ?>"/>
            </form>
        </div>
        <br/>
        <div id="mensajeConfig">
            
        </div>
    </body>
</html>


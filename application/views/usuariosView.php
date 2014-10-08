<!DOCTYPE>
<html>
    <head>
        <title>Usuarios</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="home">
        <?php include ('header.php'); ?>
        <div id="tooplate_wrapper">
            <div class='menuArea'>
                <?php 
                    include 'headAdmin.php';
                ?>
            </div>
        </div>
        <div class="principalAreaP dark">
            <input type="hidden" id="url" value="<?php echo base_url(); ?>"/>
            <table>
                <tr>
                    <?php echo form_open("usuariosController/crearUsuario"); ?>
                        <td>
                            <input type="button" id="nuevoUsuario" value="Crear Usuario"/>
                        </td>
                    <?php echo form_close(); ?>
                    <?php echo form_open("usuariosController/eliminarUsuario"); ?>
                        <td>
                            <input type="button" id="eliminarUsuario" value="Eliminar Usuario"/>
                        </td>
                    <?php echo form_close(); ?>
                    <?php echo form_open("usuariosController/modificarUsuario"); ?>
                        <td>
                            <input type="button" id="modificarUsuario" value="Modificar Usuario"/>
                        </td>
                    <?php echo form_close(); ?>
                </tr>
            </table>
        </div>
        <br/><br/>
        <input type="hidden" id="urlUsuarios" value="<?php echo base_url(); ?>"/>
        <div id="usuarioRegistrarC">
            <?php echo form_open(); ?>
                    <table class="tRegistro">
                        <tr>
                            <td>Nombre:</td>
                            <td><input type='text' name='nombre' id="nombre" value="<?php echo set_value('nombre');?>"</td>
                            <td class="error"><?php echo form_error('nombre'); ?></td>
                        </tr>
                        <tr>
                            <td>Apellido Paterno:</td>
                            <td><input type='text' name='apellidoP' id="apellidoP" value="<?php echo set_value('apellidoP');?>"</td>
                            <td class="error"><?php echo form_error('apellidoP'); ?></td>
                        </tr>
                        <tr>
                            <td>Apellido Materno:</td>
                            <td><input type='text' name='apellidoM' id="apellidoM" value="<?php echo set_value('apellidoM');?>"</td>
                            <td class="error"><?php echo form_error('apellidoM'); ?></td>
                        </tr>
                        <tr>
                            <td>Contraseña:</td>
                            <td><input type='password' name='pass' id="pass" value="<?php echo set_value('pass');?>"</td>
                            <td class="error"><?php echo form_error('pass'); ?></td>
                        </tr>
                        <tr>
                            <td>Repita su contraseña:</td>
                            <td><input type='password' name='passCon' id="passCon" value="<?php echo set_value('passCon');?>"</td>
                            <td class="error"><?php echo form_error('passCon'); ?></td>
                        </tr>
                        <tr>
                            <td>Correo:</td>
                            <td><input type='text' name='mail' id="mail" value="<?php echo set_value('mail');?>"</td>
                            <td class="error"><?php echo form_error('mail'); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <br/><br/>
                            <td><input type='button' id="registraUsuarioC" value='Registrar'/></td>
                        </tr>
                    </table>
            <?php echo form_close(); ?>
        </div>
        <div id="usuarioEliminarC">
            <select id="usuarioSelectC">
                <option value="">Selecciona un usuario</option>
                <?php 
                    if($usuarios->num_rows > 0) {
                        foreach($usuarios->result() as $row) {
                            echo "<option value='".$row->idUsuarios."'>".$row->Nombre." ".$row->APaterno." ".$row->AMaterno."</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div id="usuarioModificarC">
            
        </div>
        <div id="contenido">
            
        </div>
    </body>
</html>
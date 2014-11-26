
<!DOCTYPE>
<html>
    <head>
        <title>Job Scope</title>
        <link type="image/x-icon" href="<?php echo base_url(); ?>images/websiteico.ico" rel="shortcut icon"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="home">
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
            <input type="hidden" id="url" value="<?php echo base_url(); ?>"/>
            <table style="margin-left: 38%;">
                <tr>
                    <?php echo form_open("usuarioscontroller/crearUsuario"); ?>
                        <td>
                            <input class='btn btn-primary' type="button" id="nuevoUsuario" value="Create user"/>
                        </td>
                    <?php echo form_close(); ?>
                    <?php echo form_open("usuarioscontroller/eliminarUsuario"); ?>
                        <td>
                            <input class='btn btn-primary' type="button" id="eliminarUsuario" value="Delete user"/>
                        </td>
                    <?php echo form_close(); ?>
                    <?php echo form_open("usuarioscontroller/modificarUsuario"); ?>
                        <td>
                            <input class='btn btn-primary' type="button" id="modificarUsuario" value="Modify user"/>
                        </td>
                    <?php echo form_close(); ?>
                </tr>
            </table>
        </div>
        <br/><br/>
        <div id="contenido" style="font-size: 15px; margin-left: 30%; margin-right: 30%">
            
        </div><br/>
        <input type="hidden" id="urlUsuarios" value="<?php echo base_url(); ?>"/>
        <div id="usuarioRegistrarC" style="margin-left:13%; margin-right:13%">
            <?php echo form_open(); ?>
            <div style="width: 70%">
                    <table class="table table-bordered table-hover table-striped" style="margin-left: 20%">
                        <tr>
                            <td><strong>Name:</strong></td>
                            <td><input type='text' class="form-control" name='nombre' id="nombre" value="<?php echo set_value('nombre');?>"</td>
                            <td class="error"><?php echo form_error('nombre'); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Paternal lastname:</strong></td>
                            <td><input type='text' class="form-control" name='apellidoP' id="apellidoP" value="<?php echo set_value('apellidoP');?>"</td>
                            <td class="error"><?php echo form_error('apellidoP'); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Maternal lastname:</strong></td>
                            <td><input type='text' class="form-control" name='apellidoM' id="apellidoM" value="<?php echo set_value('apellidoM');?>"</td>
                            <td class="error"><?php echo form_error('apellidoM'); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Password:</strong></td>
                            <td><input type='password' class="form-control" name='pass' id="pass" value="<?php echo set_value('pass');?>"</td>
                            <td class="error"><?php echo form_error('pass'); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Re entry password:</strong></td>
                            <td><input type='password' class="form-control" name='passCon' id="passCon" value="<?php echo set_value('passCon');?>"</td>
                            <td class="error"><?php echo form_error('passCon'); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Mail:</strong></td>
                            <td><input type='text' class="form-control" name='mail' id="mail" value="<?php echo set_value('mail');?>"</td>
                            <td class="error"><?php echo form_error('mail'); ?></td>
                        </tr>
                        <tr>
                            <?php 
                                if($this->session->userdata('tipo') == 2 || $this->session->userdata('tipo') == 1) {
                                    echo '<td><strong>User type</strong></td>';
                                    echo '<td>';
                                        echo '<select id="userType" class="form-control" name="userType">';
                                            echo '<option value="2">Supervisor</option>';
                                            echo '<option value="3">Worker</option>';
                                        echo '</select>';
                                    echo '</td>';
                                } else {
                                    echo '<input type="hidden" id="userType" name="userType" value="3"/>';
                                }
                            ?>
                        </tr>
                        <tr>
                            <td></td>
                            <br/><br/>
                            <td><input class='btn btn-primary' type='button' id="registraUsuarioC" value='Register'/></td>
                        </tr>
                    </table>
            </div>
            <?php echo form_close(); ?>
        </div>
        <div id="usuarioEliminarC" style="text-align: center; margin-left: 35%; margin-right: 35%">
            <select id="usuarioSelectC" class="form-control">
                <option value="">Choose an user</option>
                <?php 
                    if($usuarios->num_rows > 0) {
                        foreach($usuarios->result() as $row) {
                            echo "<option value='".$row->idUsuarios."'>".$row->Nombre." ".$row->APaterno." ".$row->AMaterno."</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div id="usuarioModificarC" style="text-align: center; margin-left: 35%; margin-right: 35%">
            <select id="usuarioModificarSelectC" class="form-control">
                <option value="">Choose an user</option>
                <?php 
                    if($usuarios->num_rows > 0) {
                        foreach($usuarios->result() as $row) {
                            echo "<option value='".$row->idUsuarios."'>".$row->Nombre." ".$row->APaterno." ".$row->AMaterno."</option>";
                        }
                    }
                ?>
            </select>
        </div><br/><br/>
        <div id="contenidoModificar" style="margin-left: 25%; margin-right: 25%; text-align: center">
            
        </div>
        <div id="buttonShow" style="text-align: center">
            <input class='btn btn-danger' type='button' id='eliminarUsuarioConfig' value='Delete'/>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <title>LDAW-AMS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php include ('header.php'); ?>
        <div>
            <?php 
                if(isset($error)) {
                    echo "<div class='alert alert-danger'>".$error."</div>";
                }
            ?>
        </div>
        <div>
            <?php
                if(isset($success)) {
                    echo "<div class='alert alert-success'>".$success."</div>";
                }                 
            ?>
        </div>
        <div id='header' class="dark" align="center">
            <?php echo form_open('principalController/home'); ?>
                <div align="center">
                    <h1>Welcome !</h1>
                    <br/>
                    <div><h2>Log in to the system:</h2></div>
                    <table class='table'>
                        <tr>
                            <td><label>User: </label></td>
                            <td><input type="text" id="usuario" name="usuario"/></td>
                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td><input type="password" id="passwd" name="passwd"/></td>
                        </tr>
                    </table>
                    <input type="submit" value="Entrar" class='boton'/>
                </div>
            <?php echo form_close(); ?>
            <br/>
            <div id='second'>
                <?php echo form_open('principalController/registrar'); ?>
                    <input type="hidden" id="url" value="<?php echo base_url(); ?>"/>
                    <label>Do not have an account?</label><br/>
                    <input type='submit' id="nuevoUsuario" value='Registrarse'/>
                <?php echo form_close(); ?>
            </div>
            <div id="contenido" style="display: none">
                
            </div>
        </div>
        <div class='footer'>
            <?php include 'footer.php'; ?>
        </div>
    </body>
</html>

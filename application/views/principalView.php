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
                    echo "<div class='error'>".$error."</div>";
                }
            ?>
        </div>
        <div>
            <?php
                if(isset($success)) {
                    echo "<div class='success'>".$success."</div>";
                }                 
            ?>
        </div>
        <div id='header' class="dark">
            <?php echo form_open('principalController/home'); ?>
                <div>
                    <h1>Bienvenido!</h1>
                    <br/>
                    <div><h2>Ingresa al sistema:</h2></div>
                    <table class='table'>
                        <tr>
                            <td><label>Usuario: </label></td>
                            <td><input type="text" id="usuario" name="usuario"/></td>
                        </tr>
                        <tr>
                            <td>Contraseña: </td>
                            <td><input type="password" id="passwd" name="passwd"/></td>
                        </tr>
                    </table>
                    <input type="submit" value="Entrar" class='boton'/>
                </div>
            <?php echo form_close(); ?>
            <br/>
            <div id='second'>
                <?php echo form_open('principalController/registrar'); ?>
                    <label>¿Aún no tienes cuenta?</label><br/>
                    <input type='submit' value='Registrarse'/>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class='footer'>
            <?php include 'footer.php'; ?>
        </div>
    </body>
</html>

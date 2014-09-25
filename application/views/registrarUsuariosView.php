<?php 
    include_once 'header.php';
?>

<title>Home</title>
<body class="home">
    <div id="tooplate_wrapper">
        <div class="menuArea">
        </div>
        <div class="principalArea">
            <div>
                <div id="title"><h2>Nuevo usuario</h2></div>
            </div>
            <div id="contentArea">
                
            </div>
        </div>
            <div class="principalAreaP dark">
                <?php echo form_open('usuariosController/registraUsuario'); ?>
                    <table>
                        <tr>
                            <td>Nombre:</td>
                            <td><input type='text' name='nombre'</td>
                        </tr>
                        <tr>
                            <td>Apellido Paterno:</td>
                            <td><input type='text' name='apellidoP'</td>
                        </tr>
                        <tr>
                            <td>Apellido Materno:</td>
                            <td><input type='text' name='apellidoM'</td>
                        </tr>
                        <tr>
                            <td>Contraseña:</td>
                            <td><input type='password' name='pass'</td>
                        </tr>
                        <tr>
                            <td>Correo:</td>
                            <td><input type='text' name='mail'</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type='submit' value='Registrar'/></td>
                        </tr>
                    </table>
                <?php echo form_close(); ?>
                <?php 
                    if(isset($error)) {
                            echo "<div class='error'>".$error."</div>";
                        }
                ?>
            </div>
            <div>
            </div>
    </div>
    <div id='footerid'>
        <div class="footer">
                <?php include_once 'footer.php'; ?>
        </div>
    </div>
</body>

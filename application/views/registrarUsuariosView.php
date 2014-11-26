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
                <div id="title"><h2>New User</h2></div>
            </div>
            <div id="contentArea">
                
            </div>
        </div>
        <input type="hidden" id="url" value="<?php echo base_url(); ?>"/>
            <div class="principalAreaP dark">
<!--                <div class="loadImage">
                    <form enctype="multipart/form-data" class="formulario">
                        <input name="archivo" type="file" id="imagen" />
                        <input type="button" value="Subir imagen" id="sendImage"/>
                    </form>                    
                </div>-->
                <div class="messages">
                    <!--Aquﾃｭ se visualiza el mensaje de cargar imagenes-->
                </div><br/>
                <div class="showImage">
                    <!--div para visualizar en el caso de imagen-->
                </div>
                <?php echo form_open('usuariosController/registraUsuario'); ?>
                    <table class="tRegistro">
                        <tr>
                            <td>Name:</td>
                            <td><input type='text' name='nombre' value="<?php echo set_value('nombre');?>"</td>
                            <td class="error"><?php echo form_error('nombre'); ?></td>
                        </tr>
                        <tr>
                            <td>Paternal lastname:</td>
                            <td><input type='text' name='apellidoP' value="<?php echo set_value('apellidoP');?>"</td>
                            <td class="error"><?php echo form_error('apellidoP'); ?></td>
                        </tr>
                        <tr>
                            <td>Maternal last name:</td>
                            <td><input type='text' name='apellidoM' value="<?php echo set_value('apellidoM');?>"</td>
                            <td class="error"><?php echo form_error('apellidoM'); ?></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type='password' name='pass' value="<?php echo set_value('pass');?>"</td>
                            <td class="error"><?php echo form_error('pass'); ?></td>
                        </tr>
                        <tr>
                            <td>Re entry password:</td>
                            <td><input type='password' name='passCon' value="<?php echo set_value('passCon');?>"</td>
                            <td class="error"><?php echo form_error('passCon'); ?></td>
                        </tr>
                        <tr>
                            <td>Mail:</td>
                            <td><input type='text' name='mail' value="<?php echo set_value('mail');?>"</td>
                            <td class="error"><?php echo form_error('mail'); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <br/><br/>
                            <td><input type='submit' class="btn btn-primary" value='Registrar'/></td>
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

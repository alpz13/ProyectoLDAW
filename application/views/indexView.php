<!DOCTYPE html>
<html>
<?php include_once('header_intro.php'); ?>
<body>
        <?php if(isset($bin) || isset($error)) { ?>
            <script>
                $(document).ready(function() {
                    $("#principalDiv").hide();
                    $("#login").show();
                });
            </script>
        <?php } ?>
        <div style="text-align: center;" id="principalDiv">
            <h1>Job Scope</h1>
        </div>
	<div id="intro">
		<div>                    
                        <!-- Aquﾃｭ comienzan las formas de login y registro-->
                        <div id="registro">
                            <br/><br/><br/><br/>
                            <?php echo form_open('usuariosController/registraUsuario'); ?>
                            <h2>New User:</h2>
                                <table>
                                    <tr>
                                        <td>Name:</td>
                                        <td><input type='text' name='nombre' id="nombre"</td>
                                        <td><?php echo form_error('nombre'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Paternal Surname:</td>
                                        <td><input type='text' name='apellidoP' id="apellidoP"</td>
                                        <td><?php echo form_error('apellidoP'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Maternal Surname:</td>
                                        <td><input type='text' name='apellidoM' id="apellidoM"</td>
                                        <td><?php echo form_error('apellidoM'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Password:</td>
                                        <td><input type='password' name='pass' id="pass"</td>
                                        <td><?php echo form_error('pass'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Re-entry Password:</td>
                                        <td><input type='password' name='passCon' id="passCon"</td>
                                        <td><?php echo form_error('passCon'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mail:</td>
                                        <td><input type='text' name='mail' id="mail"</td>
                                        <td><?php echo form_error('mail'); ?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input id="registrarUsuario" class="btn btn-primary" type="button" value='Register' data-type="zoomin" style="top: 232px; left: 190px;"/>&nbsp;
                                            <input id="back" class="btn btn-danger" type="button" value="Back" />
                                        </td>
                                    </tr>
                                </table>
                            <?php echo form_close(); ?>
                            <br/>
                        </div>
                        <div>
                            <div id="contenido">

                            </div>
                        </div>
                        <div id="login">
                            <br/><br/><br/>
                            <?php echo form_open('principalController/home'); ?>
                                <div><h2>Log in:</h2></div>
                                <table>
                                    <tr>
                                        <td><label>User: </label></td>
                                        <td><input type="text" id="usuario" name="usuario"/></td>
                                    </tr>
                                    <tr>
                                        <td>Password </td>
                                        <td><input type="password" id="passwd" name="passwd"/></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="submit" class="btn btn-primary" value="Enter"/>
                                            <input type="button" class="btn btn-primary" id="registerButton" value="Register"/>
                                        </td>
                                    </tr>
                                </table>
                            <?php echo form_close(); ?>
                        </div>
                        <div>
                            <br/><br/><br/>
                            <!--<button class="button_par" type="button" id="loginButton" style="top: 232px; left: 190px;">Login</button>-->
                        </div>
                        <div>
                            <?php 
                                if(isset($error)) {
                                    echo "<div><p>".$error."</p></div>";
                                }
                            ?>
                        </div>
                        <div>
                            <?php
                                if(isset($success)) {
                                    echo "<div>".$success."</div>";
                                }                 
                            ?>
                        </div>
                        <input type="hidden" id="url" value="<?php echo base_url(); ?>"/>
		</div>
            <br/><br/>
	</div>	
</body>
</html>
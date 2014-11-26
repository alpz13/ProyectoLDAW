<script>
    $(document).ready(function() {
        $("#contenido2").hide();
        $("#actualizaUsuario").click(function() {
            url = $("#urlUsuarioActualizar").val();
            id = $("#idUsuario").val();
            nombre = $("#nombreM").val();
            apellidoP = $("#apellidoPM").val();
            apellidoM = $("#apellidoMM").val();
            pass = $("#passM").val();
            passCon = $("#passConM").val();
            mail = $("#mailM").val();
            foto = "";
            $.post(url+"index.php/usuarioscontroller/modificarUsuario", {
                id : id,
                nombre : nombre,
                apellidoP : apellidoP,
                apellidoM : apellidoM,
                pass : pass,
                passCon : passCon,
                mail : mail,
                foto : foto
            }, function(data) {
                $("#contenido2").html(data);
                $("#contenido2").show();
            });
        });
    });
</script>
<?php
    foreach($usuario->result() as $row) {
        $id = $row->idUsuarios;
        $nombre = $row->Nombre;
        $aPaterno = $row->APaterno;
        $aMaterno = $row->AMaterno;
        $pass = $row->Passwd;
        $mail = $row->Mail;
    }
?>
<div>
    <input type="hidden" id="urlUsuarioActualizar" value="<?php echo base_url(); ?>"/>
    <input type="hidden" id="idUsuario" value="<?php echo $id; ?>"/>
    <table class="tRegistro" style="margin-left: 30%;">
        <tr>
            <td>Name:</td>
            <td><input type='text' name='nombre' id="nombreM" value="<?php echo $nombre;?>"</td>
            <td class="error"><?php echo form_error('nombre'); ?></td>
        </tr>
        <tr>
            <td>Paternal lastname:</td>
            <td><input type='text' name='apellidoP' id="apellidoPM" value="<?php echo $aPaterno;?>"</td>
            <td class="error"><?php echo form_error('apellidoP'); ?></td>
        </tr>
        <tr>
            <td>Maternal lastname:</td>
            <td><input type='text' name='apellidoM' id="apellidoMM" value="<?php echo $aMaterno;?>"</td>
            <td class="error"><?php echo form_error('apellidoM'); ?></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type='password' name='pass' id="passM" value="<?php echo $pass;?>"</td>
            <td class="error"><?php echo form_error('pass'); ?></td>
        </tr>
        <tr>
            <td>Re entry password:</td>
            <td><input type='password' name='passCon' id="passConM" </td>
            <td class="error"><?php echo form_error('passCon'); ?></td>
        </tr>
        <tr>
            <td>Mail:</td>
            <td><input type='text' name='mail' id="mailM" value="<?php echo $mail;?>"</td>
            <td class="error"><?php echo form_error('mail'); ?></td>
        </tr>
        <tr>
            <td></td>
            <br/><br/>
            <td><input class='btn btn-primary' type='button' id="actualizaUsuario" value='Actualizar'/></td>
        </tr>
    </table>
</div>
<div id="contenido2">
    
</div>


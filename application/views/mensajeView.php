<script>
$(document).ready(function() {
	$('#close').click(function() {
        $('.overlay-container').fadeOut().end().find('.window-container').removeClass('window-container-visible');
    });
});
</script>

<div class="mensajeView">
	Deben llenarse todos los campos
	<br/><br/>
	<input type='button' class='button_par' id='close' value='Cerrar'/>
</div>
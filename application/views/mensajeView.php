<script>
$(document).ready(function() {
	$('#close').click(function() {
        $('.overlay-container').fadeOut().end().find('.window-container').removeClass('window-container-visible');
    });
});
</script>

<div class="mensajeView">
	All fields must be complete.
	<br/><br/>
	<input type='button' class='btn btn-primary' id='close' value='Close'/>
</div>
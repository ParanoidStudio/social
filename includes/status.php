<?php
require 'config.php';
$data = $_POST;
$id = $_SESSION['logged_user']->id;
$status = $data['status'];
if (trim($status) == '') {
	?>
	<script type="text/javascript">
		$('#status_message').text('Вы не ввели статус.'); 
	</script>
	<?php
} else {
	R::exec("UPDATE users SET status = '".$status."' WHERE id = '".$id."'");
	$_SESSION['logged_user']->status = $status;
	echo $data['status'];
	?>
	<script type="text/javascript">

                $('.form_status').css({'display':'none'});
                $('.status_add_button').css({'opacity':'1'});
                $('.status').css({'opacity':'1'})
                $('#status_message').text('');
	</script>
	<?php
}

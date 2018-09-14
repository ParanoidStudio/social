<?php
require 'config.php';
$data = $_POST;

// Переменные для JS
$error_name = false;
$error_surname = false;
$error_password = false;
$error_re_password = false;
$error_email = false;

if (trim($data['name']) == '') {
  $errors[] = 'Введите ваше имя.';
  $error_name = true;
}
if (trim($data['surname']) == '') {
  $errors[] = 'Введите фамилию.';
  $error_surname = true;
}
if (trim($data['email']) == '') {
  $errors[] = 'Введите email.';
  $error_email = true;
}
if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
	$errors[] = "Введите корректный адрес эл. почты";
	$error_email = true;
}
if (trim($data['password']) == '') {
  $errors[] = 'Введите пароль.';
  $error_password = true;
  $error_re_password = true;
}
if (iconv_strlen($data['password']) < 8) {
  $errors[] = 'Пароль должен содержать больше, чем 7 символов.';
  $error_password = true;
}
if ($data['re_password'] != $data['password']) {
  $errors[] = 'Пароли не совпадают';
  $error_re_password = true;
}
if (R::count('users', 'email = ?', array($data['email'])) > 0)
{
  $errors[] = 'Пользователь с такой эл. почтой уже существует. Введите другую эл. почту';
  $error_email = true;
}
if (empty($errors)) {
  $users = R::dispense('users');
  $users->name = $data['name'];
  $users->surname = $data['surname'];
  $users->email = $data['email'];
  $users->gender = $data['gender'];
  $users->password = password_hash($data['password'], PASSWORD_DEFAULT);
  $users->root = 0;
  $users->date = date("Y-m-d H:i:s");
  R::store($users);
  ?>
  <script type="text/javascript">
    alert('Вы успешно зарегистрированы');
    $("#form_signup_name, #form_signup_name_surname, #form_signup_password, #form_signup_re_password, #form_signup_email").val("");
  </script>
  <?php

} else {
  echo '<span style="color: red">'.array_shift($errors).'</span>';
}
?>
<script type="text/javascript">
	$("#form_signup_name, #form_signup_surname, #form_signup_password, #form_signup_re_password, #form_signup_email").removeClass("input_error");

	var errorEmpty = "<?php echo $errors;?>";
	var errorName = "<?php echo $error_name?>";
	var errorEmail = "<?php echo $error_email?>";
	var errorSurname = "<?php echo $error_surname?>";
	var errorPassword = "<?php echo $error_password?>";
	var errorRePassword = "<?php echo $error_re_password?>";


	if (errorName == true) {
		$('#form_signup_name').addClass('input_error');
	}
	if (errorSurname == true) {
		$('#form_signup_surname').addClass('input_error');
	}
	if (errorEmail == true) {
		$('#form_signup_email').addClass('input_error');
	}
	if (errorPassword == true) {
		$('#form_signup_password').addClass('input_error');
	}
	if (errorRePassword == true) {
		$('#form_signup_re_password').addClass('input_error');
	}
</script>
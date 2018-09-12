<?php
header("X-XSS-Protection: 1; mode=block"); 
require 'includes/config.php'; 
$data = $_POST;
if (trim($data['name']) == '') {
  $errors[] = 'Введите ваше имя и фамилию.';
}
if (trim($data['surname']) == '') {
  $errors[] = 'Введите логин.';
}
if (trim($data['email']) == '') {
  $errors[] = 'Введите email.';
}
if (trim($data['password']) == '') {
  $errors[] = 'Введите пароль.';
}
if (iconv_strlen($data['password']) < 8) {
  $errors[] = 'Пароль должен содержать больше, чем 7 символов.';
}
if ($data['re_password'] != $data['password']) {
  $errors[] = 'Пароли не совпадают';
}
if (R::count('users', 'email = ?', array($data['email'])) > 0)
{
  $errors[] = 'Пользователь с такой эл. почтой уже существует. Введите другую эл. почту';
}
?>
<!DOCTYPE html>
 <html>
  <head>
     <title>Пампушка</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/style.css">
      <script type="text/javascript" src="css/style.css"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
     </head>
     <body>
          
      <!-- HEADER -->
          <div class="head">
       <!--      <div class="logo">
            <a href="#" class="reg">Регистрация</a>-->
          </div> 

      <!-- CONTENT -->
          <div class="content">
            <div class="main_content">
              <h1>Какая-то инфа</h1>
            </div>


            <div class="forms">


              <!-- ФОРМА АВТОРИЗАЦИИ -->
              <form class="form_signin">
                <input type="text" name="login" placeholder="Login или Email">
                <input type="password" name="password" placeholder="Пароль">
                <button class="button">Войти</button>
              </form>
              <!-- ФОРМА РЕГИСТРАЦИИ -->
                <form method="POST" action="index.php" class="form_signup">
                  <input type="text" name="name" placeholder="Ваше имя.">
                  <input type="text" name="surname" placeholder="Ваш фамилия">
                  <input type="text" name="email" placeholder="Ваш email.">
                  <input type="password" name="password" placeholder="Пароль">
                  <input type="password" name="re_password" placeholder="Введите пароль повторно.">
                  <button class="button">Зарегистрироваться</button>
                </form>

<?php
require 'includes/signup.php';
?>
            </div>

          </div>

         </div>
            


         

     </body>
</html>
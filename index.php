<?php
header("X-XSS-Protection: 1; mode=block"); 
require 'includes/config.php'; 
$data = $_POST;
$errors_signin = array();
if (isset($data['do_login'])) {
  $user = R::findOne('users', 'email = ?', array($data['email_signin']));
  if ( $user ) {
    if (password_verify($data['password_signin'], $user->password)) {
      $_SESSION['logged_user'] = $user;
    } else {
      $errors_signin[] = 'Неверно введен пароль.';
    }
  } else {
    $errors_signin[] = 'Пользователь с таким логином не найден.';
  }
}
?>
<!DOCTYPE html>
 <html>
  <head>
     <title>FUCK</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/style.css">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
       <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
     </head>
     <body>
          
      <!-- HEADER -->
      <div class="head">
        <div class="first_head_container">
        <h1 class="logo"><a href="index.php"><i class="fas fa-home"></i></a></h1>
        </div>
        <div class="second_head_container">
        <!-- <h1 ><i class="fas fa-exclamation"></i></h1> -->
         </div>
        </div>

      <!-- CONTENT -->
          <div class="content">
            <div class="main_content">
              <div class="info">
                <h1 >САМАЯ ПИЗДАТАЯ СОЦ. СЕТЬ</h1>
              </div>

            </div>


            <div class="forms">


              <!-- ФОРМА АВТОРИЗАЦИИ -->
              <form class="form_signin" method="POST">
                <input type="text" name="email_signin" placeholder="Login или Email">
                <input type="password" name="password_signin" placeholder="Пароль">
                <button class="button" name="do_login" id='button_signin'>Войти</button>
      <?php
      
               if( ! empty($errors_signin)) {
    echo '<center><div style="color: red; margin-top:10px; font-size: 20px;">'.array_shift($errors_signin).'</div></center>';
   } 
if (isset($_SESSION['logged_user'])) {
  ?>
  <center><hr><div style="color: #484E53; margin-top:10px; font-size: 20px;">Вы успешно авторизованы!</div></center>
  <script type="text/javascript">
   
  location="profile.php";

  document.location.href="profile.php";

  location.replace("profile.php");

  window.location.reload("profile.php");

  document.location.replace("profile.php");
  </script>

  <?php
} 
    ?>




<!-- СКРИПТ ДЛЯ ВАЛИДАЦИИ -->

<script type="text/javascript">
  $(document).ready(function () {
    $("#form_signup").submit(function(event) {
      event.preventDefault();
      var name = $("#form_signup_name").val();
      var surname = $("#form_signup_surname").val();
      var email = $("#form_signup_email").val();
      var password = $("#form_signup_password").val();
      var re_password = $("#form_signup_re_password").val();
      var gender = $("#form_signup_gender").val();
      $("#form_signup_message").load("includes/signup.php", 
      {
        name: name,
        surname: surname,
        email: email,
        gender: gender,
        password: password,
        re_password: re_password,
      })
    });
  });
</script> 

              </form>





              <!-- ФОРМА РЕГИСТРАЦИИ -->
                <form method="POST" action="includes/signup.php" class="form_signup" id="form_signup">
                  <input type="text" name="name" placeholder="Ваше имя." id="form_signup_name" class="form_input">
                  <input type="text" name="surname" placeholder="Ваш фамилия" id="form_signup_surname" class="form_input">
                  <select id="form_signup_gender"  name="gender">
                    <option value="male">Мужчина</option>
                    <option value="female">Женщина</option>
                    <option value="non-binary">Гендерфлюид</option>
                  </select>
                  <input type="email" name="email" placeholder="Ваш email." id="form_signup_email" class="form_input">
                  <input type="password" name="password" placeholder="Пароль" id="form_signup_password" class="form_input">
                  <input type="password" name="re_password" placeholder="Введите пароль повторно." id="form_signup_re_password" class="form_input">
                  <button class="button" id="#signup">Зарегистрироваться</button>
                  <p id="form_signup_message"></p>
                </form>






            </div>

          </div>

         </div>
            


         

     </body>
</html>
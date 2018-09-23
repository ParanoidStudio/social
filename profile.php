<?php
require 'includes/config.php';
if (isset($_SESSION['logged_user'])) {
$data = $_POST;
?>
<!DOCTYPE html>
 <html>
  <head>
     <title>FUCK</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/profile.css">
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
     </head>
     <body>


<script type="text/javascript">
  $('.my').change(function() {
    if ($(this).val() != '') $(this).prev().text('Выбрано файлов: ' + $(this)[0].files.length);
    else $(this).prev().text('Выберите файлы');
});
</script>
         


      <div class="head">
        <div class="first_head_container">
        <h1 class="logo"><a href="profile.php"><i class="fas fa-home"></i></a></h1>
        <h1 class="logo"><a href="news.php"><i class="far fa-newspaper"></i></a></h1>
        </div>
        <div class="second_head_container">
        <!-- <h1 ><i class="fas fa-exclamation"></i></h1> -->
        <a href="includes/logout.php">Выход из аккаунта</a>   
         </div>
        </div>
         <main>
        <div class="sidebar">
         <div class="user_photo"></div>
          <div class="user_status">
            <p class="on-line"> Online</p>
           </div>
         </div>

<!-- Обновление статуса -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#form_status').submit(function(event) {
      event.preventDefault();
      var status = $('#status_input').val();
      $('.status').load("includes/status.php", 
      {
        status: status
        })
    });
  });


</script>



         <div class="content">

          <div class="user_info">
            <h2 class="user_name_surname"><?php
                  echo $_SESSION['logged_user']->name;
                  echo " ";
                  echo $_SESSION['logged_user']->surname;
                  ?></h2>
            <div class="status_container">
            <p class="status"><?php echo $_SESSION['logged_user']->status;?></p>
            <a class="status_add_button"> <i class="fas fa-pen"></i></a>
            <form class="form_status" action="includes/status.php" method="POST" id="form_status">
              <input type="text" name="status" value="<?php echo $_SESSION['logged_user']->status;?>" id="status_input">
              <button id="change_status" type="submit">Изменить</button>
              <p id="status_message"></p>
            </form>
            <script type="text/javascript">

                $('.status_add_button').on('click', function(){
                $('.form_status').css({'display':'flex'});
                $('.status_add_button').css({'opacity':'0'});
                $('.status').css({'opacity':'0'})
                });
            </script>
            </div>

          </div>
<!-- ОТПРАВКА ПОСТА -->
<script type="text/javascript">
  $(document).ready(function(){
    $('.post').submit(function(yo) {
      yo.preventDefault();
      var post_text = $('#post_input').val();
      $('#new_post_message').load("includes/post.php", 
      {
        post_text: post_text
        })
    });
  });


</script>
          <div class="add_post">
            <form class="post" action="includes/post.php" method="POST">
                <div class="button_input">
              <input type="text" name="post_text" id='post_input' placeholder="Что у вас нового?">
         <div class="dada">
            <label for="myfile" class="chous"><i class="fas fa-camera"></i></label>
            <input type="file" class="my" id="myfile" name="post_image" multiple="multiple"/>
          </div>
        </div>  
              <button type="submit">Поделиться</button>
              <p id="new_post_message"></p>

            </form>
          </div>


         <div class="posts">
          <script type="text/javascript">

            $(document).ready(function() {
            setInterval(function load() {
                $('.posts').load('includes/fast.php');
              }, 100);
            });
          </script>
         </div>



       </div>
             </main>
 </body>
</html>
<?php
} else  {
  header('Location: http://social/index.php');
}
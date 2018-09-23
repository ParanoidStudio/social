<?php
require 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>NEWS</title>
	<link rel="stylesheet" type="text/css" href="css/news.css">
      <meta charset="utf-8">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
       <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
	<!-- ХЭДЭР -->
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


        <!-- CONTENT -->
        <div class="content">


<script type="text/javascript">
  $('.my').change(function() {
    if ($(this).val() != '') $(this).prev().text('Выбрано файлов: ' + $(this)[0].files.length);
    else $(this).prev().text('Выберите файлы');
});
</script>
         
       	
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
                $('.posts').load('includes/fastGen.php');
              }, 100);
            });
          </script>
         </div>

        </div>

</body>
</html>
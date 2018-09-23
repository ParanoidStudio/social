                  <?php

ini_set('display_errors','On');
error_reporting('E_ALL');
                  require 'config.php';
                  $PostArr = R::find('posts', 'id_user = ?', array($_SESSION['logged_user']->id));
                  $PostArr = R::exportAll($PostArr);
                  $post_user_id = R::findOne('users', '`id` = ?', array($PostArr['id_user']));
                  arsort($PostArr);

                  foreach ($PostArr as $Post) { 
                  ?>             
            <div class="new_post">
              <!-- INFO -->
              <div class="post_user_info">
                <div class="post_user_info_photo"></div>
                <div class="post_user_info_container">
                  <a class="post_user_info_name"><?php
                  $post_user_id = R::findOne('users', '`id` = ?', array($Post['id_user']));
                  
                  echo $post_user_id['name'];
                  echo " ";
                  echo $post_user_id['surname'];
                  ?></a>
                  <div class="post_user_info_date">
                    <?php
                    echo $Post['date'];
                    ?>
                  </div>
                </div>
              </div>
              <!-- POST -->
          
              <div class="post_content">
                <div class="post_text">
                  <?php
                    echo $Post['text'];
                    
                  ?>
                </div>

                 <div class="post_photo">
 <!--                <img src="https://media.rusbase.com/upload_tmp/sv6.jpg" style="width: 400px; height: 300px;">
                 <img src="https://media.rusbase.com/upload_tmp/sv6.jpg" style="width: 400px; height: 300px;">
                  <img src="https://media.rusbase.com/upload_tmp/sv6.jpg" style="width: 400px; height: 300px;">
                   <img src="https://media.rusbase.com/upload_tmp/sv6.jpg" style="width: 400px; height: 300px;"> -->

              </div>

              </div>      

              </div>
           <?php
            }
            ini_set('display_errors','Off');
          ?>      
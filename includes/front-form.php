<?php
/*shortcode+form*/
function prtf_shortcode() {

  ob_start(); ?>
  <div class="wrap">
    <form method="post" action="" id="add-items">

      <input type="text" class="username" id="username" name="username" placeholder="Felhasználónév"/>

      <input type="text" class="email" id="email" name="email" placeholder="Email"/>

      <textarea type="text" class="comment" id="comment" name="comment" placeholder="Üzenet"></textarea>

      <input type="submit" id="add" name="submit" />



    </form>
 <div id="response"></div>



  </div>

  <?php
  echo ob_get_clean();
}

add_shortcode( 'vendégkönyv', 'prtf_shortcode' );

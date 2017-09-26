<?php

/*admin menü és oldal létrehozása*/

function prtf_options_page() {

  ob_start(); ?>
  <div class="wrap">
  <h2>Vendégkönyv admin panel</h2>
  <p>A vendégkönyv aktiválása:</p>
  <ol>
    <li>Nyiss egy új lapot</li>
    <li>Címként add meg a 'Vendégkönyv' nevet</li>
    <li>Az oldal tartalmaként szúrd be azt a kódot: [vendégkönyv]</li>
    <br />
    <p>
      A Vendégkönyv egy új oldalon fog megjelenni.
    </p>
    <p>
      Az alábbiakban pedig a hozzászólásokat láthatod és törölheted, ha nem tetszik. :)
    </p>
  </ol>
  </div>
  <div class="wrap">
    <h2>Hozzászólások</h2>
    <table class="widefat">
      <thead>
        <tr>
          <th>ID</th>
          <th></th>
          <th>Név</th>
          <th></th>
          <th>Email</th>
          <th></th>
          <th>Hozzászólás</th>
        </tr>
      </thead>
      <tbody>
      <?php
     global $wpdb;
             global $table_name;
             $table_name = $wpdb->prefix . 'guestbook';

             $getcomments = $wpdb->get_results(
               "SELECT ID, username, email, comment FROM $table_name"
             );
           ?>
           <?php
             foreach ($getcomments as $getcomment) {
           ?>
           <tr>
             <?php
             echo "<td>". $getcomment->ID."<td>";
             echo "<td>". $getcomment->username."<td>";
             echo "<td>". $getcomment->email."<td>";
             echo "<td>". $getcomment->comment."<td>";

             ?>
           </tr>
             <?php
           }
           ?>
         </tbody>
      <tfoot>
        <tr>
          <th>ID</th>
          <th></th>
          <th>Név</th>
          <th></th>
          <th>Email</th>
          <th></th>
          <th>Hozzászólás</th>
        </tr>
      </tfoot>
    </table>
  </div>

    </table>
  </div>
  <?php
  echo ob_get_clean();
}

function prtf_add_options_link() {
  add_menu_page( 'Vendégkönyv', 'Vendégkönyv', 'manage_options' , 'vendegkonyv', 'prtf_options_page');
}
add_action( 'admin_menu', 'prtf_add_options_link' );

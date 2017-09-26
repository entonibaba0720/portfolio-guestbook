<?php

//ajax in frontend
function myplugin_ajaxurl() {

   echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}
add_action('wp_head', 'myplugin_ajaxurl');


// add data to the database

function add_data_callback(){
if (!empty($_POST)) {
global $wpdb;
  $table_name = $wpdb->prefix . 'guestbook';
  $username = ($_POST['username']);
  $email = ($_POST['email']);
  $comment = ($_POST['comment']);
        //Check if table exists
        if($wpdb->get_var("show tables like '.$table_name'") != $table_name);

        $sql=$query  = $wpdb->insert(
      	''.$table_name.'',
      	array(
      		'username' => $_POST['username'],
      		'email' => $_POST['email'],
          'comment' => $_POST['comment']
      	),
      	array(
      		'%s',
      		'%s',
          '%s'
      	)
      );

      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);

      }

}

$response .= "username: " . $_POST["username"] . "
";
$response .= "comment: " . $_POST["comment"] . "
";

return $response;
wp_send_json(data);
if(isset($_POST['submit'])) add_data_callback();
add_action( 'wp_ajax_add_data', 'add_data_callback' );
// this hook is fired if the current viewer is not logged in
add_action( 'wp_ajax_nopriv_add_data', 'add_data_callback' );


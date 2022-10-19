<?php
require_once('../../private/initialize.php');

if(is_post_request()) {
  $name = $_POST['salamanderName'];

  echo "Salamander Name: $name";
} 

else {
redirect_to(url_for('/salamanders/new.php'));
}

?>
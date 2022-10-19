<?php

require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/salamanders/index.php'));
}
$id = $_GET['id'];
$name = '';

if(is_post_request()) {
  $name = $_POST['salamanderName'];

  echo "Salamander Name: $name";
}

$page_title = 'Edit Salamander';
require_once(SHARED_PATH .'/salamander-header.php');
?>




<div id="content">

  <p><a href=<?=url_for('salamanders/index.php') ?>>&laquo; Back to Salamander List</a></p>
  <div class="subject edit">
    <h1>Edit Salamander</h1>

    <form action="<?= url_for('/salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
      <label for="salamanderName">Name</label>
      <br>
      <input type="text" name="salamanderName" id="salamanderName" value="<?= h($name);?>">
      <br>
      <input type="submit" value="Edit Salamander">
    </form>

  </div>

</div>
<?php include(SHARED_PATH . '/salamander-footer.php'); ?>

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

    <form action="<?php echo url_for('salamanders/create.php'); ?>" method="post">
      <label for="salamanderName">Name:</label>
      <br>
      <input type="text" name="salamanderName" id="salamanderName">
      <br><br>
      <label for="habitat">Habitat:</label>
      <br>
      <textarea rows="4" cols="50" name="habitat" id="habitat"></textarea>
      <br><br>
      <label for="description">Description:</label>
      <br>
      <textarea rows="4" cols="50" name="description" id="description"></textarea>
      <br><br>
      <input type="submit" value="Create Salamander">
    </form>

  </div>

</div>
<?php include(SHARED_PATH . '/salamander-footer.php'); ?>

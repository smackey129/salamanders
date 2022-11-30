<?php

require_once('../../private/initialize.php');

$test = $_GET['test'] ?? '';

if($test == '404') {
  error_404();
} elseif($test == '500') {
  error_500();
} elseif($test == 'redirect') {
  redirect_to(url_for('salamanders/index.php'));
}

if(is_post_request()) {
  $salamander = [];
  $salamander['name'] = $_POST['salamanderName'];
  $salamander['habitat'] = $_POST['habitat'];
  $salamander['description'] = $_POST['description'];
  $result = insert_salamander($salamander);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('salamanders/show.php?id=' . $new_id));
  }
  else {
    $errors = $result;
  }
  
} 

$page_title = 'Create Salamander';
require_once(SHARED_PATH .'/salamander-header.php');
?>




<div id="content">

  <p><a href=<?=url_for('salamanders/index.php') ?>>&laquo; Back to Salamander List</a></p>
  <div class="subject new">
    <h1>Create Salamander</h1>

    <?= display_errors($errors) ?>
    <form action="<?php echo url_for('salamanders/new.php'); ?>" method="post">
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

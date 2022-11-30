<?php

require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/salamanders/index.php'));
}
$id = $_GET['id'];
$salamander = find_salamander_by_id($id);

if(is_post_request()) {
  $salamander = [];
  $salamander['id'] = $id;
  $salamander['name'] = $_POST['salamanderName'];
  $salamander['habitat'] = $_POST['habitat'];
  $salamander['description'] = $_POST['description'];

  $result = update_salamander($salamander);

  if($result === true){
    redirect_to(url_for('salamanders/show.php?id=' . $id));
  } else {
    $errors = $result;
  }
  
}

$page_title = 'Edit Salamander';
require_once(SHARED_PATH .'/salamander-header.php');
?>




<div id="content">

  <p><a href=<?=url_for('salamanders/index.php') ?>>&laquo; Back to Salamander List</a></p>
  <div class="subject edit">
    <h1>Edit Salamander</h1>

    <?= display_errors($errors) ?>

    <form action="<?php echo url_for('salamanders/edit.php?id=' . h($id)); ?>" method="post">
      <label for="salamanderName">Name:</label>
      <br>
      <input value= "<?= $salamander['name'] ?>" type="text" name="salamanderName" id="salamanderName">
      <br><br>
      <label for="habitat">Habitat:</label>
      <br>
      <textarea rows="4" cols="50" name="habitat" id="habitat"><?= $salamander['habitat'] ?></textarea>
      <br><br>
      <label for="description">Description:</label>
      <br>
      <textarea rows="4" cols="50" name="description" id="description"><?= $salamander['description'] ?></textarea>
      <br><br>
      <input type="submit" value="Create Salamander">
    </form>

  </div>

</div>
<?php include(SHARED_PATH . '/salamander-footer.php'); ?>

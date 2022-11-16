<?php

require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/salamanders/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
  $result = delete_salamander($id);
  redirect_to(url_for('salamanders/index.php'));
} else {
  $salamander = find_salamander_by_id($id);
}

$page_title = 'Delete Salamander';
require_once(SHARED_PATH .'/salamander-header.php');
?>




<div id="content">

  <p><a href=<?=url_for('salamanders/index.php') ?>>&laquo; Back to Salamander List</a></p>
  <div class="subject edit">
    <h1>Delete Salamander</h1>
    <p>Are you sure you want to delete this salamander?</p>
    <p><?= $salamander['name']?></p>
    <form action="<?= url_for('salamanders/delete.php?id=' . h(u($id))); ?>" method="post">
      <input type="submit" value="Delete Salamander">
    </form>

  </div>

</div>
<?php include(SHARED_PATH . '/salamander-footer.php'); ?>

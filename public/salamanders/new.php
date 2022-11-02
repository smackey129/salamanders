<?php

require_once('../../private/initialize.php');

$test = $_GET['test'] ?? '';

if($test == '404') {
  error_404();
} elseif($test == '500') {
  error_500();
} elseif($test == 'redirect') {
  redirect_to(url_for('/salamanders/index.php'));
}

$page_title = 'Create Salamander';
require_once(SHARED_PATH .'/salamander-header.php');
?>




<div id="content">

  <p><a href=<?=url_for('salamanders/index.php') ?>>&laquo; Back to Salamander List</a></p>
  <div class="subject new">
    <h1>Stub for Create Salamander</h1>

    <!-- <form action="<?php echo url_for('/salamanders/create.php'); ?>" method="post">
      <label for="salamanderName">Name</label>
      <br>
      <input type="text" name="salamanderName" id="salamanderName">
      <br>
      <input type="submit" value="Create Salamander">
    </form> -->

  </div>

</div>
<?php include(SHARED_PATH . '/salamander-footer.php'); ?>

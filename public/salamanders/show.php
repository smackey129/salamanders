<?php require_once('../../private/initialize.php'); 

$id = $_GET['id'] ?? 1;
$sql = "SELECT * FROM salamander ";
$sql .= "WHERE id ='". $id . "'";
$result = mysqli_query($db, $sql);
confirm_result_set($result);

$subject = mysqli_fetch_assoc($result);
mysqli_free_result($result);
$page_title = 'Salamander Details';
include(SHARED_PATH . '/salamander-header.php');
?>

<h2>Salamander Details</h2>

<p><strong>ID: </strong><?= h($subject['id']) ?> </p>
<p><strong>Name: </strong><?= h($subject['name']) ?></p>
<p><strong>Habitat: </strong><br><?= h($subject['habitat']) ?></p>
<p><strong>Description: </strong><br><?= h($subject['description']) ?></p>
<p><a href=<?=url_for('salamanders/index.php') ?>>&laquo; Back to Salamander List</a></p>
<?php include(SHARED_PATH . '/salamander-footer.php'); ?>

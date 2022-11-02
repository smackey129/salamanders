<?php 

require_once("../../private/initialize.php");


$salamanders = find_all_salamanders();

$page_title = 'Salamanders';

require_once(SHARED_PATH .'/salamander-header.php');
?>

<h1>Salamanders</h1>

  <a href="<?php echo url_for('/salamanders/new.php'); ?>">Create Salamander</a>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Habitat</th>
    <th>Description</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

      <?php foreach($salamanders as $salamander) { ?>
        <tr>
          <td><?= $salamander['id'] ?></td>
    	    <td><?= $salamander['name'] ?></td>
          <td><?= $salamander['habitat'] ?></td>
    	    <td><?= $salamander['description'] ?></td>
          <td><a class="action" href="<?= url_for('salamanders/show.php?id=' . h(u($salamander['id']))); ?>">View</a></td>
          <td><a class="action" href="<?= url_for('salamanders/edit.php?id=' . h(u($salamander['id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?= url_for('salamanders/delete.php?id=' . h(u($salamander['id']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>

<?php
include_once 'parts/head.php';
include_once 'parts/nav.php';
?>

<?php if (isset($_GET['view'])): ?>
    <?php if ($_GET['view'] == 'all'):?>
      <?php include_once 'parts/pages/all-restaurants.php'; ?>
    <?php else: ?>
      <?php include_once 'parts/pages/single-restaurant.php'; ?>
    <?php endif; ?>
<?php else: ?>
  <?php include_once 'parts/pages/all-restaurants.php'; ?>
<?php endif ?>


<?php include_once 'parts/footer.php'; ?>
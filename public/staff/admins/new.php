<?php

require_once('../../../private/initialize.php');

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['admin'];
  // promenjeno u html admin[brand] i onda ne treba sve ovo
//  $args['brand'] = $_POST['brand'] ?? NULL;
//  $args['model'] = $_POST['model'] ?? NULL;
//  $args['year'] = $_POST['year'] ?? NULL;
//  $args['category'] = $_POST['category'] ?? NULL;
//  $args['color'] = $_POST['color'] ?? NULL;
//  $args['gender'] = $_POST['gender'] ?? NULL;
//  $args['price'] = $_POST['price'] ?? NULL;
//  $args['weight_kg'] = $_POST['weight_kg'] ?? NULL;
//  $args['condition_id'] = $_POST['condition_id'] ?? NULL;
//  $args['description'] = $_POST['description'] ?? NULL;

  $admin = new Admin($args); // salje automatski $args u __consturct
  $result = $admin->save();
  
  if($result === true) {
    $new_id = $admin->id;
    $_SESSION['message'] = 'The admin was created successfully.';
    redirect_to(url_for('/staff/admins/show.php?id=' . $new_id));
  } else {
    // show errors
  }

} else {
  // display the form
  $admin = new Admin;
}

?>

<?php $page_title = 'Create Admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin new">
    <h1>Create Admin</h1>

    <?php  echo display_errors($admin->errors); ?>

    <form action="<?php echo url_for('/staff/admins/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>
      
      <div id="operations">
        <input type="submit" value="Create Admin" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>

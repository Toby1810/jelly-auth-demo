<?php if ($logged_in): ?>
  <p>Hello, <?php echo $user->username; ?>!</p>
<?php else: ?>
  <p>Hello! You are not currently logged in.</p>
<?php endif; ?>

<ul id="user_menu">
<?php if ($logged_in): ?>
  <li>
    <?php echo HTML::anchor(Route::get('default')->uri(array('action' => 'logout')), 'Logout'); ?>
  </li>
<?php else: ?>
  <li><?php echo HTML::anchor(Route::get('default')->uri(array('action' => 'login')), 'Login'); ?></li>
  <li><?php echo HTML::anchor(Route::get('default')->uri(array('action' => 'register')), 'Register'); ?></li>
<?php endif; ?>
</ul>

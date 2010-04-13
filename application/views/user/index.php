<h1>Home</h1>

<p>
	<strong>Actions:</strong> 
	<?php if ($logged_in): ?>
		<?php echo HTML::anchor(Route::get('default')->uri(array('action' => 'logout')), 'Logout'); ?>
	<?php else: ?>
		<?php echo HTML::anchor(Route::get('default')->uri(array('action' => 'login')), 'Login'); ?>,
		<?php echo HTML::anchor(Route::get('default')->uri(array('action' => 'register')), 'Register'); ?>
	<?php endif; ?>
</p>

<?php if (! $logged_in): ?>
	<p>You are not logged in. Log in or register.</p>
<?php else: ?>
  <p>You are logged in as <strong><?php echo $user->username; ?></strong>.</p>
<?php endif; ?>

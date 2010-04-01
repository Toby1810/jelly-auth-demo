<?php if($error): ?>
<ul id="errors">
  <li>There was a problem logging you in.</li>
</ul>
<?php endif; ?>

<div id="user_form">
  <?php echo Form::open(); ?>
  
  <p><?php echo Form::label('username', 'Username'); ?></p>
  <p><?php echo Form::input('username', NULL, array('id' => 'username')); ?></p>

  <p><?php echo Form::label('password', 'Password'); ?></p>
  <p><?php echo Form::password('password', NULL, array('id' => 'password')); ?></p>
  
  <p>
    <?php echo Form::checkbox('remember', NULL, FALSE, array('id' => 'remember')); ?>
    <?php echo Form::label('remember', 'Stay logged in'); ?>
  </p>

  <p>
    <?php echo Form::submit('login', 'Login'); ?>
    or <?php echo HTML::anchor(Route::get('user')->uri(array('action' => 'index')), 'return to the index'); ?>.
  </p>
  
  <?php echo Form::close(); ?>
</div>

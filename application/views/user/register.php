<?php if(is_array($errors)): ?>
<ul id="errors">
<?php foreach($errors as $field => $message): ?>
  <li><strong><?php echo $field; ?></strong>: <?php echo $message; ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
  

<div id="user_form">
  <?php echo Form::open(); ?>
  
  <p><?php echo Form::label('username', 'Username'); ?></p>
  <p><?php echo Form::input('username', $user->username, array('id' => 'username')); ?></p>
  
  <p><?php echo Form::label('email', 'Email Address'); ?></p>
  <p><?php echo Form::input('email', $user->email, array('id' => 'email')); ?></p>

  <p><?php echo Form::label('password', 'Password'); ?></p>
  <p><?php echo Form::password('password', NULL, array('id' => 'password')); ?></p>

  <p><?php echo Form::label('password_confirm', 'Password (again)'); ?></p>
  <p><?php echo Form::password('password_confirm', NULL, array('id' => 'password_confirm')); ?></p>
  
  <p>
    <?php echo Form::submit('register', 'Register an account'); ?> or <a href="/user/index">go back</a>.
  </p>
  
  <?php echo Form::close(); ?>
</div>

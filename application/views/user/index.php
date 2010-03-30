<?php if ($logged_in): ?>
  <p>Hello, <?php echo $user->username; ?>!</p>
<?php else: ?>
  <p>Hello! You are not currently logged in.</p>
<?php endif; ?>

<ul id="user_menu">
<?php if ($logged_in): ?>
  <li>
    <a href="/user/logout">Logout</a>
  </li>
<?php else: ?>
  <li><a href="/user/login">Login</a></li>
  <li><a href="/user/register">Register</a></li>
<?php endif; ?>
</ul>

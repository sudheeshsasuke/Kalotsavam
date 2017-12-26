<?php 

ob_start();?>
<h1>Candidate Login</h1>
<form action="/index.php/login_user" method="post">
	<br>
	<input type="text" placeholder="name" name="user_name" required><br><br>
	<input type="email" placeholder="email" name="user_email" required><br><br>
	<input type="submit" value="submit">
</form>
<?php $content = ob_get_clean();
  require 'templates/layout.tpl.php';?>

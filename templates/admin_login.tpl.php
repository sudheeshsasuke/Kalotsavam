<?php 

ob_start();?>
<h1>Candidate Login</h1>
<form action="/index.php/login_admin" method="post">
	<br>
	<input type="text" placeholder="user name" name="admin_name" required><br><br>
	<input type="password" placeholder="password" name="admin_password" required><br><br>
	<input type="submit" value="submit">
</form>
<?php $content = ob_get_clean();
  require 'templates/layout.tpl.php';?>

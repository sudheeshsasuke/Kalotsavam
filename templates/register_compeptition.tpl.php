<?php 

ob_start();?>
<h1>Register competition</h1>
<form action="/index.php/register_compeptition_action" method="post">
	<br>
  <label for="competition">Select a competition</label><br>
	<select name="competition">
    <option value=" ">Select</option>
    <?php foreach($competitions as $com):?>
      <option value="<?php echo htmlentities($com['id'])?>"><?php echo htmlentities($com['name']);?></option>
    <?php endforeach;?>
  </select>
  <br><br>
  <input type="name" placeholder="name" name="user_email" required><br><br>
	<input type="email" placeholder="email" name="user_email" required><br><br>
	<input type="submit" value="submit">
</form>
<?php $content = ob_get_clean();
  require 'templates/layout.tpl.php';?>
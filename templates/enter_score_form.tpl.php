<?php 

ob_start();?>
<h1>Register competition</h1>
<form action="/index.php/enter_mark_action" method="post">
	<br>
  <label for="competition">Select competition</label><br>
	<select name="competition">
    <option value=" ">Select</option>
    <?php foreach($competitions as $com):?>
      <option value="<?php echo $com['id']?>"><?php echo htmlentities($com['name']);?></option>
    <?php endforeach;?>
  </select>
  <br><br>
  <label for="candidate">Select candidate chestnumber</label><br>
	<select name="chessno">
    <option value=" ">Select</option>
    <?php foreach($list as $l):?>
      <option value="<?php echo $l['chess_no']?>"><?php echo $l['chess_no'];?></option>
    <?php endforeach;?>
  </select>
  <br><br>
  <input type="name" placeholder="mark" name="mark" required><br><br>
	<input type="submit" value="submit">
</form>
<?php $content = ob_get_clean();
  require 'templates/layout.tpl.php';?>
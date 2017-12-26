<?php 

ob_start();?>
<h1>Candidate score board</h1>
<form action="/index.php/Candidate_Score_Board_action" method="post">
	<br>
  <label for="candidate">Select candidate</label><br>
	<select name="candidate">
    <option value=" ">Select</option>
    <?php foreach($list as $l):?>
      <option value="<?php echo htmlentities($l['id']);?>"><?php echo htmlentities($l['name']);?></option>
    <?php endforeach;?>
  </select>
  <br><br>
	<input type="submit" value="submit">
</form>
<?php $content = ob_get_clean();
  require 'templates/layout.tpl.php';?>
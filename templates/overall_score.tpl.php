<?php 

ob_start();?>
<h1>Over all score</h1>
<table>
  <thead>
    <td>Name<td>
    <td>Score</td>
  <thead>
  <tbody>
  <?php foreach($scores as $l): ?>
    <tr>
    <td><?php echo htmlentities($l['name']);?></td>
    <td><?php echo htmlentities($l['score']);?></td>
    </tr>
  <?php endforeach;?>
  </tbody>
</table>
<?php $content = ob_get_clean();
  require 'templates/layout.tpl.php';?>
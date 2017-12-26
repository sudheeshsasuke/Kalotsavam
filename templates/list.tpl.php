<?php 

ob_start();?>
<h1>List of competitions</h1>
<ul>
  <?php foreach($list as $l): ?>
    <li><?php echo htmlentities($l['name']);?></li>
  <?php endforeach;?>
</ul>
<?php $content = ob_get_clean();
  require 'templates/layout.tpl.php';?>
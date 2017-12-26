<?php 

ob_start();?>
<h1>Competition participants</h1>
  <?php $i = 0;?>
  <?php foreach($scorelist as $l1): ?>
    
    <?php echo htmlentities($com[$i]['name']); $i++;?>    
    <?php foreach($l1 as $l2): ?>
      <li><?php echo htmlentities($l2['part_name']);?> = <?php echo htmlentities($l2['score']); ?></li>
    <?php endforeach;?>
  <?php endforeach;?>
<?php $content = ob_get_clean();
  require 'templates/layout.tpl.php';?>
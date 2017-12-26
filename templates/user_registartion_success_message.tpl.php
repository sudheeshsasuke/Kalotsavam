<?php 

ob_start();?>
<h1>Candidate Registartion was successfull</h1>
<p>
Once the admin approve your registration an email will be sent to you and you can 
login to the website.<br><br>
Thank you.
</p>

<?php $content = ob_get_clean();
  require 'templates/layout.tpl.php';?>

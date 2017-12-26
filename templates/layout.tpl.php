<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <style>
      td {
        margin: 10px;
        padding: 5px;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <ul id="header">
          <a href="http://kalotsavam.local/">
            <li>Home</li>
          </a>
          <?php  if(isset($_SESSION['user_email']) || isset($_SESSION['admin'])):?>
          <a href="http://kalotsavam.local/index.php/logout">
            <li>logout</li>
          </a>
          <?php endif;?>
        </ul>
        <p style="margin:30px;">
        <div>
          <?php echo $content;?>
        </div>
      </div>
    </div>
  </body>
</html>

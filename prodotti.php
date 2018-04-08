<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Pizzeria Rosso Blu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="/pizzeria/assets/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="/pizzeria/assets/css/style.css">
  </head>
  <?php 
  $homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
  include $homedir.'/pizzeria/menu.php';?>
  <body>
  	
    <div class="container" id="page-content">
    	<div class="row">
        
        <div class="list-group">
          <a href="/pizzeria/prodotti-pizze.php" class="list-group-item">Pizze</a>
          <a href="/pizzeria/admin/panini" class="list-group-item">Panini</a>
          <a href="/pizzeria/admin/insalate" class="list-group-item">Insalate</a>
          <a href="/pizzeria/admin/bibite" class="list-group-item">Bibite</a>
        </div>
      </div>
    </div>
  <?php 
  $homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
  include $homedir.'/pizzeria/footer.php';?>

    <script src="/pizzeria/assets/scripts/jquery.min.js"></script>
    <script src="/pizzeria/assets/scripts/popper.min.js"></script>
    <script src="/pizzeria/assets/scripts/bootstrap.min.js"></script>
    <script src="/pizzeria/assets/scripts/custom.js"></script>
  </body>
</html>

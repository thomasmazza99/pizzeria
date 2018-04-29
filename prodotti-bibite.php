<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Pizzeria Rosso Blu - Bibite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="/pizzeria/assets/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="/pizzeria/assets/css/style.css">
  </head>

  <body>

<?php
//start session
session_start();

//get session data
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
$homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );

require_once  $homedir.'/pizzeria/db.php';
$db = new DB();

$bibite = $db->getRows('Bibite',array('order_by'=>'prezzo'));

?>

  <?php 
  
  include $homedir.'/pizzeria/menu.php';
  
  ?>
  <body>
  	
<div class="container" id="page-content">
    
    <div class="row">
    <?php if(!empty($bibite)): $count = 0; foreach($bibite as $bibita): $count++; ?> 
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="" alt="">
                <div class="caption">
                    <h3><?php echo $bibita['nome_bibite']; ?></h3>
                    <p><?php echo $bibita['dimensione']; ?></p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                </div>
        </div>
    </div>
    <?php endforeach; else: ?>

<?php endif; ?>
    </div>
</div>
<?php include $homedir.'/pizzeria/footer.php';?>

    <script src="/pizzeria/assets/scripts/jquery.min.js"></script>
    <script src="/pizzeria/assets/scripts/popper.min.js"></script>
    <script src="/pizzeria/assets/scripts/bootstrap.min.js"></script>
    <script src="/pizzeria/assets/scripts/custom.js"></script>
  </body>
</html>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Pizzeria Rosso Blu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <?php include 'menu.php';?>
  
<?php



//get session data

$homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
require_once  $homedir.'/pizzeria/db.php';
require_once  $homedir.'/pizzeria/Carrello_obj.php';
//start session
session_start();

$db = new DB();
$cart = !empty($_SESSION['cart'])?$_SESSION['cart']:new Carrello($db);

if(isset($_GET['id_product']) && isset($_GET['delete']) && isset($_GET['tipo'])){
    $cart->delete($_GET['id_product'],$_GET['tipo']);
    $_SESSION['cart'] = $cart;
}
    if(isset($_GET['id_pizza'])){
        $cart->add($_GET['id_pizza'], 1, "pizze");
        $_SESSION['cart'] = $cart;
    }

    if(isset($_GET['id_panini'])){
        $cart->add($_GET['id_panini'], 1, "panini");
        $_SESSION['cart'] = $cart;
    }
    if(isset($_GET['id_insalate'])){
        $cart->add($_GET['id_insalate'], 1, "insalate");
        $_SESSION['cart'] = $cart;
    }
    if(isset($_GET['id_bibite'])){
        $cart->add($_GET['id_bibite'], 1, "bibite");
        $_SESSION['cart'] = $cart;
    }
?>
  <body>
  	
    <div class="container" id='page-content'>
        <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ingredienti</th>
                    <th>Prezzo</th>
                </tr>
            </thead>
            <tbody id="userData">
                <?php if(!empty($cart->items)): $count = 0; foreach($cart->items as $item): $count++; ?>
                <tr>
                    <td><?php echo $item->product_id; ?></td>
                    <td><?php echo $item->quantity; ?></td>
                    <td><?php echo $item->tipo; ?></td>
                    <td>
                        <a href="carrello.php?delete=true&id_product=<?php echo $item->product_id; ?>&tipo=<?php echo $item->tipo; ?>"><i class="glyphicon glyphicon-edit"></i></a>
                        
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="5">Nessun risultato</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
            
        </div>
	<?php include 'footer.php';?>
    </div>


    <script src="assets/scripts/jquery.min.js"></script>
    <script src="assets/scripts/popper.min.js"></script>
    <script src="assets/scripts/bootstrap.min.js"></script>
    <script src="assets/scripts/custom.js"></script>
  </body>
</html>

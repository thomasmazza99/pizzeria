<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Pizzeria Rosso Blu - Insalate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <?php include 'menu.php';?>
  <?php
  if(isset($_REQUEST["nome"])){
  $nome= $_REQUEST["nome"];
  $ingredienti=$_REQUEST["ingredienti"];
  $prezzo = $_REQUEST["prezzo"];
			echo $nome;
            $servername = "";
           	$username = "username";
            $password = "password";
            $dbname = "my_thomasmazza";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            	 die("Connection failed: " . $conn->connect_error);
                 echo "Connection failed: " . $conn->connect_error;
           	} 
           $sql=" INSERT INTO Insalate(nome_insalate, ingredienti, prezzo)
           VALUES ('$nome', '$ingredienti', $prezzo)";
           echo $sql;
           $result = $conn->query($sql);
  		$conn->close();
 		header("location: insalate.php");
 }
  ?>
  
  <body>
  	
    <div class="container">
    	<div class="row">

         <form action="nuova-insalate.php" method="post">
              <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome">
              </div>
              <div class="form-group">
                <label for="ingredienti">Ingredienti</label>
                <input type="text" class="form-control" name="ingredienti" id="ingredienti">
              </div>
              <div class="form-group">
                <label for="prezzo">Prezzo</label>
                <input type="text" class="form-control" name="prezzo" id="prezzo">
              </div>
              <button type="submit" class="btn btn-default">Salva</button>
              <a href="insalate.php" class="btn btn-default">Annulla</a>
            </form>
   		</div>
		<?php include 'footer.php';?>
    </div>


    <script src="assets/scripts/jquery.min.js"></script>
    <script src="assets/scripts/popper.min.js"></script>
    <script src="assets/scripts/bootstrap.min.js"></script>
    <script src="assets/scripts/custom.js"></script>
  </body>
</html>

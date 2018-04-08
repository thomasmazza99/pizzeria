<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Pizzeria Rosso Blu - Bibite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <?php include 'menu.php';?>
  <?php
   $nome= "";
  $ingredienti="";
  $prezzo = "";
  if(isset($_REQUEST["id"])){
 	 $id= $_REQUEST["id"];
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
           $sql= "SELECT * FROM `Bibite` WHERE id=".$id;
           $result = $conn->query($sql);
           if ($result->num_rows > 0) {
             	while($row = $result->fetch_assoc()) {
                	$nome=$row["nome_bibite"];
                    $ingredienti=$row["ingredienti"];
                    $prezzo=$row["prezzo"];
				}
          	}
  			$conn->close();
 }
 if(isset($_REQUEST["edit"])){
 	 $id= $_REQUEST["id"];
     $nome= $_REQUEST["nome"];
     $ingredienti= $_REQUEST["ingredienti"];
     $prezzo= $_REQUEST["prezzo"];
			
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
      $sql= " UPDATE Bibite SET nome_bibite='$nome', ingredienti='$ingredienti', prezzo=$prezzo WHERE id=$id";
           
           $result = $conn->query($sql);
  		$conn->close();
        header("location: bibite.php");
 }
  ?>
  
  <body>
  	
    <div class="container">
    	<div class="row">

         <form action="modifica-bibite.php?id=<?php echo $id ?>&edit=true" method="post">
              <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $nome ?>">
              </div>
              <div class="form-group">
                <label for="ingredienti">Ingredienti</label>
                <input type="text" class="form-control" name="ingredienti" id="ingredienti" value="<?php echo $ingredienti ?>" >
              </div>
              <div class="form-group">
                <label for="prezzo">Prezzo</label>
                <input type="text" class="form-control" name="prezzo" id="prezzo" value="<?php echo $prezzo ?>">
              </div>
              <button type="submit" class="btn btn-default">Salva</button>
              <a href="bibite.php" class="btn btn-default">Annulla</a>
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

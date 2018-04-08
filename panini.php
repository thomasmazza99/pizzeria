<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Pizzeria Rosso Blu - Panini</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <?php include 'menu.php';?>
  <body>
  	
    <div class="container">
    	<div class="row">
        	<a href='nuova-panini.php' type='button' class='btn btn-secondary'>Aggiungi</a>
        </div>
    	<div class="row">
        
			<table class="table table-hover">
 				<thead>
                	<th>
                    	Nome
                    </th>
                	<th>
                    	Ingredienti
                    </th>
                    <th>
                    	Prezzo
                    </th>
                    <th>
                    	Azioni
                    </th>
                </thead>
                <tbody>
                <?php      
            
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
            
            $sql = "SELECT * FROM Panini";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
             	while($row = $result->fetch_assoc()) {
                	echo "<tr>";
                	echo "<td>" . $row["nome_panini"]. "</td>";
                	echo "<td>" . $row["ingredienti"]. "</td>";
                	echo "<td>" . $row["prezzo"]. "</td>";
                    echo "<td>
                    		<a href='modifica-panini.php' type='button' class='btn btn-secondary'>Modifica</a>
                    		<a href='elimina-panini.php' type='button' class='btn btn-danger'>Elimina</a>
                          </td>";
                    echo "</tr>";
				}
          	}
            $conn->close();
            ?>
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

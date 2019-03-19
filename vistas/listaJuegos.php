
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Practica1 Seminario1</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet">
</head>

<body class="light-green accent-2">
  <nav class="grey darken-1 lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="http://ec2-3-17-11-100.us-east-2.compute.amazonaws.com" class="brand-logo">New game</a>
      <ul class="right ">
        <li><a class="waves-effect waves-light btn-flat white-text" href="http://ec2-3-17-11-100.us-east-2.compute.amazonaws.com/vistas/listaJuegos.php"><i class="material-icons left">list</i>juegos</a></li>
      </ul>
      <ul class="right ">
        <li><a class="waves-effect waves-light btn-flat white-text" href="http://ec2-3-17-11-100.us-east-2.compute.amazonaws.com/vistas/addJuegos.html"><i class="material-icons left">add</i>juegos</a></li>
      </ul>
    </div>
  </nav>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      
      <div class="row center">
        <h5 class="header col s12 light ">Juegos almacenados </h5>
      </div>
      <ul class="collection">
        <?php
          $host = 'practica1.cclfdl028j9k.us-east-2.rds.amazonaws.com';
          $user = 'byrich';
          $pass = '24490024';
          $db_name = 'dbDos';
          $conn = new mysqli($host,$user,$pass,$db_name);
          if ($conn->connect_error) {
            die('error de conecion '. $conn-> connect_error);
          }
          $sql = "SELECT * FROM Juegos";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) 
          {
            // output data of each row
            while($row = $result->fetch_assoc()) {


              echo " <li class='collection-item avatar'>";
              echo " <img src=". $row["img_url"]." class='material-icons circle'>";
              echo " <span class='title'>".$row["nombre"]."</span>";
              echo "<p>Compañia: " . $row["compania"] . " </p>";
              echo "<p>Fecha: " . $row["fecha"] . " </p>";
              echo "<a class='secondary-content'><i class='material-icons'>grade</i></a>";
              echo "</li>";
            }
          } 
          else
          {
            echo " <li class='collection-item'>";
            echo " <span class='title'> Sin juegos cargados</span>";
            echo "<a class='secondary-content'><i class='material-icons'>grade</i></a>";
            echo "</li>";
          }
          $conn->close();
        ?>
        
      </ul>
        
      <br><br>
    </div>
  </div>

  <!--  Scripts-->
  
  <script src="../js/materialize.js"></script>
  <script src="../js/jquery.js"></script>

  </body>
</html>

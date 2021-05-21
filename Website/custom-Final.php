<?php
  session_start();
  require 'config.php';
 ?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Computer Builder</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- My css -->
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<!-- Header, logo and navigation bar section -->
  <header>
    <div id="logo">
      <img src="images/logo.png" alt="logo" width="80" height="80">
      <h1>Build-a-<span>PC</span></h1>
    </div>

    <div id="menuToggler">
      &#8801;
    </div>

    <nav id="menu">
      <ul class="navigation">
        <li><a href="index.php">Home</a></li>
        <li><a href="custom-processor.php">Custom Builds</a></li>
        <li><a href="#">Prebuilds</a></li>
        <li><a href="#">About</a></;li>
      </ul>
    </nav>
  </header>

  <main>
    <h3>Component Selector - Motherboards</h3>

             <table class="table table-bordered">
               <tr>
                 <th width="60%">Item</th>
                 <th width="30%">Price</th>
                 <th width="20%">Action</th>
               </tr>
               <?php
                if(!empty($_SESSION["currentConfiguration"]))
                {
                  $total = 0;
                  foreach($_SESSION["currentConfiguration"] as $keys => $values)
                  {
                    echo "<tr>";
                    echo "<td>" .$values["item_name"] ."</td>";
                    echo "<td>" .$values["item_price"] ."</td>";
                    echo "<td>";
                    echo "<a href='custom-motherboard.php?action=delete&id=".$values["item_id"] ."'>Remove</a>";
                    echo "</td>";
                    echo "</tr>";
                    echo "</tr>";
                  }
                }
                ?>
              </table>


  </main>

</body>

<footer>
  <div class="footerContainer">
  <p><b>Copyright</b><br><br><br>&#169; Bruce Bradshaw<br>
  Demontfort University 2020 / 2021</p>
  <hr>
  <ul class="footerSitemap">
    <li><p><b>Sitemap</b></p></li>
    <li><a href="#">Home</a></li>
    <li><a href="#">Custom Builds</a></li>
    <li><a href="#">Prebuilds</a></li>
    <li><a href="#">About</a></li>
  </ul>
</div>

</footer>


<script src="js/scripts.js"></script>
</body>
</html>

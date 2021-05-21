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
    <h3>Component Selector - Processors</h3>
        <div class="col-lg-3">
          <h4>Filter Products</h4><Br>
          <hr>
          <h6>Processor Type</H6>

            <?php
            $processorResult = $link->query("SELECT DISTINCT Manufacturer FROM processor");
             ?>

            <form method="POST">
             <select name="processorManufacturer">
              <option value="" disabled selected>Choose option</option>
               <?php
               while($rows = $processorResult->fetch_assoc()){
                 $manufacturer_name = $rows['Manufacturer'];
                 echo "<option value='$manufacturer_name' selected='selected'>$manufacturer_name</option>";
               }
                ?>
             </select><br><br>
             <input type="submit" name="submit" value="Refine results">
            </form>

            <hr>
            <h6> Current Configuration </h6>

            <?php
            //Script for button to add to configuration
            if(isset($_POST["add_to_config"]))
            {
              if(isset($_SESSION["currentConfiguration"]))
              {
                $item_array_id = array_column($_SESSION["currentConfiguration"], "item_id");
                if(!in_array($_GET["id"], $item_array_id))
                {
                  $count = count($_SESSION["currentConfiguration"]);
                  $item_array = array(
                    'item_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'item_price' => $_POST["hidden_price"]
                  );
                  $_SESSION["currentConfiguration"] [$count] = $item_array;
                  echo "<script> window.location='custom-motherboard.php'</script>";
                }
                else {
                  echo "<script> alert('Item already added to configuration')</script>";
                  echo "<script> window.location='custom-processor.php'</script>";
                }
              }
              else {
                {
                  $item_array = array (
                    'item_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'item_price' => $_POST["hidden_price"],
                  );
                  $_SESSION["currentConfiguration"] [0] = $item_array;
                }
              }
            }
            //script for deletion of items in the configuration
          if(isset($_GET["action"]))
              {
                if($_GET["action"] == "delete")
                {
                  foreach($_SESSION["currentConfiguration"] as $keys=>$values)
                  {
                    if($values["item_id"] == $_GET["id"])
                    {
                      unset($_SESSION["currentConfiguration"][$keys]);
                      echo "<script>alert('Item removed from configuration')</script>";
                      echo "<script>window.location='custom-processor.php'</script>";
                    }
                  }
                }
              }
             ?>

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
                    echo "<a href='custom-processor.php?action=delete&id=".$values["item_id"] ."'>Remove</a>";
                    echo "</td>";
                    echo "</tr>";
                    echo "</tr>";
                  }
                }
                ?>
              </table>


      </div>

    <div class="col-lg-9">
      <h4> Products </h4><br>
      <hr>
      <div class="row" id="result">

        <?php
        if(!empty($_POST['processorManufacturer']))
        {
          $selected = $_POST['processorManufacturer'];
          $sql="SELECT * FROM processor WHERE manufacturer = '$selected' ";
          $result = $link->query($sql);
          while($row=$result->fetch_assoc()){
            echo "<form method='post' action='custom-processor.php?action=add&id=".$row["ID"] ."' >";
            echo "<div class='col-md-3'>";
            echo "<div class='card' style='width: 18rem;'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>";
            echo $row['Name'];
            echo "</h5>";
            echo "<h6>";
            echo "Core Count: " .$row['Cores'] ."<br>";
            echo "Socket compatbility: " .$row['Socket'] ."<br>";
            echo "MSRP: £" .$row['MSRP'] ."<br>";
            echo "Current Amazon Price:" .$row['Amazon'] ."<br>";
            echo "</h6>";
            echo "<input type='hidden' name='hidden_name' value='" .$row["Name"] ."'>";
            echo "<input type='hidden' name='hidden_price' value='" .$row["Amazon"] ."'>";
            echo "<input type='submit' name='add_to_config' value='Add to Configuration'>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</form>";
          }
        }
        else {
          $sql="SELECT * FROM processor";
          $result = $link->query($sql);
          while($row=$result->fetch_assoc()){
            echo "<form method='post' action='custom-processor.php?action=add&id=".$row["ID"] ."' >";
            echo "<div class='col-md-3'>";
            echo "<div class='card' style='width: 18rem;'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>";
            echo $row['Name'];
            echo "</h5>";
            echo "<h6>";
            echo "Core Count: " .$row['Cores'] ."<br>";
            echo "Socket compatbility: " .$row['Socket'] ."<br>";
            echo "MSRP: £" .$row['RRP'] ."<br>";
            echo "Current Amazon Price: £" .$row['Amazon'];
            echo "</h6>";
            echo "<input type='hidden' name='hidden_name' value='" .$row["Name"] ."'>";
            echo "<input type='hidden' name='hidden_price' value='" .$row["Amazon"] ."'>";
            echo "<input type='submit' name='add_to_config' value='Add to Configuration'>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</form>";
        }
      }
         ?>

    </div>
      <button><a href="custom-motherboard.php">Go to motherboards</a></button>


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

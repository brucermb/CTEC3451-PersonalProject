<?php
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
      <img class="logo" src="images/logo.png" alt="logo">
      <h1>Build-a-<span>PC</span></h1>
    </div>

    <div id="menuToggler">
      &#8801;
    </div>

    <nav id="menu">
      <ul class="navigation">
        <li><a href="#">Home</a></li>
        <li><a href="#">Custom Builds</a></li>
        <li><a href="#">Prebuilds</a></li>
        <li><a href="#">About</a></;li>
      </ul>
    </nav>
  </header>

  <main>
    <h3>Test</h3>
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
            if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if ( ! in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'       => $_GET["id"],
                'item_name'     => $_POST["hidden_name"],
                'item_price'    => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already Added")</script>';
        }
    } else {
        $item_array = array(
            'item_id'       => $_GET["id"],
            'item_name'     => $_POST["hidden_name"],
            'item_price'    => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }
    }
}
?>

            <div class="table-responsive">
  <table class="table table-bordered">
    <tr>
      <th class="th40">Product Name</th>
      <th class="th10">Manufacture</th>
      <th class="th20">Price</th>
      <th class="th15">Total</th>
      <th class="th5">Action</th>
    </tr>
      <?php
      if ( ! empty($_SESSION["shopping_cart"])) {
          $total = 0;
          foreach ($_SESSION["shopping_cart"] as $keys => $values) {
              ?>
            <tr>
              <td><?= $values["item_name"]; ?></td>
              <td><?= $values["item_quantity"]; ?></td>
              <td>$ <?= $values["item_price"]; ?></td>
              <td>$ <?= number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
              <td>
                <a href="index.php?action=delete&id=<?= $values["item_id"]; ?>"><span class="text-danger">Remove</span></a>
              </td>
            </tr>
              <?php
              $total += $values["item_quantity"] * $values["item_price"];
          }
          ?>
        <tr>
          <td colspan="3">Total</td>
          <td>$ <?= number_format($total, 2); ?></td>
          <td></td>
        </tr>
          <?php
      }
      ?>
  </table>
</div>

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
            echo "<div class='col-md-3'>";
            echo "<div class='card' style='width: 18rem;'>";
            echo "<img class='card-img-top' alt='product image'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>";
            echo $row['Name'];
            echo "</h5>";
            echo "<p class='card-text'>";
            echo "put a row description in here";
            echo "</p>";
            echo "<a href='#' class='btn btn-primary'>Add to configuration</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
          }
        }
        else {
          $sql="SELECT * FROM processor";
          $result = $link->query($sql);
          while($row=$result->fetch_assoc()){
            echo "<div class='col-md-3'>";
            echo "<div class='card' style='width: 18rem;'>";
            echo "<img class='card-img-top' alt='product image'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>";
            echo $row['Name'];
            echo "</h5>";
            echo "<p class='card-text'>";
            echo "put a row description in here";
            echo "</p>";
            echo "<a href='#' class='btn btn-primary' name='add_to_config'>Add to configuration</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
      }
         ?>

    </div>

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

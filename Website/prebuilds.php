<?php
  require 'config.php';
 ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Computer Builder</title>
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
<!-- Main content of the website starts here  -->
<main>
  <h3>Our Recommended Prebuilt Configurations</h3>

<hr>
<div class="articleContainer">
  <div class="articleCard">
    <h4>High End AMD</h4>
    <hr>
    <?php
    $amdsql="SELECT * FROM motherboard WHERE Socket = '$selected' ";
     ?>
     <table>
       <th>Component</th>
       <th>Name</th>
       <td></td>
     </table>

    <br>
  </div>

  <div class="articleCard">
    <h4>High End Intel</h4>
    <hr>
    <p>Our team have selected 6 different recomended specifications so you can get to building as soon as possible
    Featuring three different AMD and Intel configurations across all price points<br>
  Entry level, medium specification and High end!</p>

  </div>
</div>
<br><br><br><br><br><br>
  </main>

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

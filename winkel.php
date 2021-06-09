<?php
  include_once(__DIR__ . "/classes/Shop.php");

  $s = new Shop();
  $prints = $s->allPrints();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <title>Winkel</title>
</head>
<body>

<?php include_once("inc/nav.inc.php"); ?>

<h1 class="card__title">Ons ready-to-print aanbod</h1>
<article class="card--shop">
  <?php foreach($prints as $key => $p): ?>
  <div class="card__header__shop">
    <figure class="card__figure">
        <a href="item.php?item=<?php echo $key+1 ?>"><img src="/images/<?php echo $p["image_path"] ?>" alt="print_keycaps" class="card__image__print"></a>
    </figure>
    <div class="card__body__shop">
        <h3 class="card__subtitle__shop"><?php echo $p["name"] ?></h3>
        <p class="card__subtitle__body">€<?php echo $p["price"] ?></p>
    </div>
  </div>
  <?php endforeach; ?>
</article>


<article class="card__shop--ownarticle">
  <div class="card__header__shop--ownarticle">
    <h2 class="card__subtitle__shop--ownarticle">Jouw eigen ontwerp</h2>
    <figure class="card__figure">
        <a href="jouw-eigen-ontwerp.php"><img src="/images/eigen_ontwerp_filar.jpg" alt="eigen_ontwerp_filar" class="card__image__print--ownarticle"></a>
    </figure>
  </div>
  <div class="card__header__shop--ownarticle">
    <h2 class="card__subtitle__shop--ownarticle">Ons gerecycleerd filament</h2>
    <figure class="card__figure">
        <a href="item.php?item=6"><img src="/images/gerecycleerd_filament.png" alt="gerecycleerd_filament" class="card__image__print--ownarticle"></a>
    </figure>
  </div>
</article>



<?php include_once("inc/footer.inc.php"); ?>
</body>
</html>
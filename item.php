<?php
    include_once(__DIR__ . "/classes/User.php");
    
    $s = new Shop();
    $key = $_GET["item"];

    $print_details = $s->productDetails($key);

    if(!empty($_POST["submitItem"])){
        $quantity = $_POST["quantity"];
        $s->getItemData($key);
        $s->addToCart($quantity, 1, $key);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <title>Item</title>
</head>
<body>

<?php include_once("inc/nav.inc.php"); ?>

<article class="card">
  <div class="card__header">
    <figure class="card__figure">
        <img src="/images/product_smartphone_houder.jpg" alt="print_smarthphone" class="card__image--item">
    </figure>
    <div class="card__body--item">
        <h1 class="card__subtitle--item"><?php echo $print_details[0]["name"] ?></h1>
        <p class="card__copy"><?php echo $print_details[0]["description"] ?></p>
        <h3 class="card__subtitle--item">Specificaties</h3>
        <ul>
            <li>Gemaakt van 100% gerecycleerd PETG</li>
            <li>Modern en minimalistisch design</li>
            <li>Stevig en compact</li>
        </ul>
        <h3 class="card__subtitle--item">Afmetingen</h3>
        <ul>
            <li>2 cm hoog</li>
            <li>4 cm breed</li>
            <li>6 cm diep</li>
        </ul>
        <form class="card__body__block" action="" method="POST">
            <div class="card__count">
                <input id="quantity" type="text" name="quantity" value="1">
            </div>
            <div class="card__arrow--first">
                <a href="#" id="add"><img class="card__img--first" src="/images/arrow_icon.png"></a>
                <!-- <div class="card__arrow--second"> -->
                <a href="#" id="subtract"><img class="card__img--second" src="/images/arrow_icon.png"></a>
                <!-- </div> -->
            </div>
            <a href="#" class="button__item">
                <span class="button__body">Toevoegen aan winkelmand</span>
            </a>
            
                <input type="submit" name="submitItem">
        </form>
    </div>
  </div>
</article>

<h1 class="card__title--item">Anderen bekeken ook</h1>
<article class="card--shop--item">
  <div class="card__header__shop">
    <figure class="card__figure">
        <a href="#"><img src="/images/product_keycaps.jpg" alt="print_keycaps" class="card__image__print"></a>
    </figure>
    <div class="card__body__shop">
        <h3 class="card__subtitle__shop">Keycaps</h3>
        <p class="card__subtitle__body">€30</p>
    </div>
  </div>
  <div class="card__header__shop">
    <figure class="card__figure">
        <a href="#"><img src="/images/product_smartphone_houder.jpg" alt="print_smarthphone" class="card__image__print"></a>
    </figure>
    <div class="card__body__shop">
        <h3 class="card__subtitle__shop">GSM-houder</h3>
        <p class="card__subtitle__body">€15</p>
    </div>
  </div>
  <div class="card__header__shop">
    <figure class="card__figure">
        <a href="#"><img src="/images/product_yoda.jpg" alt="print_yoda" class="card__image__print"></a>
    </figure>
    <div class="card__body__shop">
        <h3 class="card__subtitle__shop">Baby Yoda</h3>
        <p class="card__subtitle__body">€20</p>
    </div>
  </div>
  <div class="card__header__shop">
    <figure class="card__figure">
        <a href="#"><img src="/images/product_dalek.jpg" alt="print_dalek" class="card__image__print"></a>
    </figure>
    <div class="card__body__shop">
        <h3 class="card__subtitle__shop">Dalek</h3>
        <p class="card__subtitle__body">€25</p>
    </div>
  </div>  <div class="card__header__shop">
    <figure class="card__figure">
        <a href="#"><img src="/images/product_trees.jpg" alt="print_trees" class="card__image__print"></a>
    </figure>
    <div class="card__body__shop">
        <h3 class="card__subtitle__shop">Team Trees</h3>
        <p class="card__subtitle__body">€25</p>
    </div>
  </div>
</article>

<?php include_once("inc/footer.inc.php"); ?>

<script>
    let quantity = document.getElementById("quantity");
    let counter = parseInt(quantity.value);
    let add = document.getElementById("add");
    let subtract = document.getElementById("subtract");

    add.addEventListener("click", function(e){
        e.preventDefault();
        counter++;
        quantity.value = counter;
        console.log(counter);
    });
    
    subtract.addEventListener("click", function(e){
        e.preventDefault();
        if(counter>=2){
            counter--;
            quantity.value = counter;
            console.log(counter);
        }
    });
    
</script>

</body>
</html>
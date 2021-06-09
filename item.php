<?php
    include_once(__DIR__ . "/classes/User.php");


    session_start();

    $s = new Shop();
    $u = new User();
    $email = $_SESSION["email"];
    $id = $u->getId($email)[0][0];
    $key = $_GET["item"];
    $prints = $s->allPrints();

    $print_details = $s->productDetails($key);
    $filament_details = $s->productDetails(6);

    if(!empty($_POST["submitItem"])){
        $quantity = $_POST["quantity"];
        $s->getItemData($key);
        $s->addToCart($quantity, $id, $key);
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
        <img src="/images/<?php echo $print_details[0]["image_path"] ?>" alt="print_smarthphone" class="card__image--item">
    </figure>
    <div class="card__body--item">
        <h1 class="card__subtitle--item"><?php echo $print_details[0]["name"] ?></h1>
        <h2>€<?php echo $print_details[0]["price"] ?></h2>
        <p class="card__copy"><?php echo $print_details[0]["description"] ?></p>
        <h3 class="card__subtitle--item">Specificaties</h3>
        <ul>
            <li>Gemaakt van 100% gerecycleerd PETG</li>
            <li>Modern en minimalistisch design</li>
            <li>Stevig en compact</li>
        </ul>
        <h3 class="card__subtitle--item">Afmetingen</h3>
        <ul>
            <li><?php echo $print_details[0]["height"] ?> cm hoog</li>
            <li><?php echo $print_details[0]["width"] ?> cm breed</li>
            <li><?php echo $print_details[0]["depth"] ?> cm diep</li>
        </ul>
        <form class="card__body__block" action="" method="POST">
            <div class="card__count">
                <input class="card__count--input" id="quantity" type="text" name="quantity" value="1"></input>
            </div>
            <div class="card__arrow--first">
                <a href="#" id="add"><img class="card__img--first" src="/images/arrow_icon.png"></a>
                <!-- <div class="card__arrow--second"> -->
                <a href="#" id="subtract"><img class="card__img--second" src="/images/arrow_icon.png"></a>
                <!-- </div> -->
            </div>
                <input type="submit" name="submitItem" class="button__item" value="Toevoegen aan winkelmand"></input>
                <!-- <span class="button__body">Toevoegen aan winkelmand</span> -->
            <!-- <input type="submit" name="submitItem"> -->
        </form>
    </div>
  </div>
</article>

<h1 class="card__title--item">Anderen bekeken ook</h1>
<article class="card--shop--item">
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
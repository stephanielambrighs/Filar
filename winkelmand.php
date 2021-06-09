<?php


require_once(__DIR__ . "/autoload.php");

session_start();

// if the session is not set then a redirect
if(!isset($_SESSION['id'])){
  header("Location: login.php");
}else{

// else do something in this page
    $u = new User();
    $s = new Shop();
    $email = $_SESSION['email'];
    $id = $u->getId($email)[0][0];
    $cart_items = $s->showCart($id);
    $subtotalOrder = $s->getSubtotalOrder($id);
    if($subtotalOrder == 0){
        $sendCost = 0;
    } else {
        $sendCost = 3;
    }
    $discountMultiplier = 1;
    $coupons_used = $u->getCoupons($id);
    $coupons_available = $u->plasticTracker($id)[0];
    //$updated_coupons = $u->updateCoupons($id);
    //var_dump($updated_coupons);

    if(!empty($_POST["confirm_purchase"])){
        try {
        foreach($cart_items as $key => $c):
            if(isset($_POST["apply_discount"])){
                $discountMultiplier = 0.8;
                $u->updateCoupons($id, $coupons_available);

            }
            $s->moveToHistory($cart_items, $key, $discountMultiplier);
        endforeach;
        $s->deleteFromCart($id);
        } catch (\Throwable $th) {
            $error = $th->getMessage();
        }
    }

    if(!empty($_POST["clear_cart"])){
        $s->deleteFromCart($id);
        $cart_items = array();
    }
}

// var_dump($_POST);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <title>Winkelmand</title>
</head>
<body>

<?php include_once("inc/nav.inc.php"); ?>

<?php if(!empty($cart_items)): ?>

<h1 class="card__title">Mijn winkelmand</h1>
<?php if(isset($error)):?>
    <div><?php echo $error ?></div>
<?php endif; ?>

<table class="table--large">
  <tr class="table__header">
    <th class="table__title">Product</th>
    <th class="table__title"></th>
    <th class="table__title">Prijs</th>
    <th class="table__title">Aantal</th>
    <!-- <th class="table__title">Korting</th> -->
    <th class="table__title--item">Subtotaal</th>
    <!-- <th class="table__title"></th> -->
  </tr>
  <?php foreach($cart_items as $key => $c): ?>
  <tr class="table__item">
    <td class="table__subtitle"><img class="table__image" src="/images/<?php echo $c["image_path"] ?>" alt="smarthphone_houder"></td>
    <td class="table__subtitle">
        <span class="table__subtitle--product"><?php echo $c["name"] ?></span>
    </td>
    <td class="table__subtitle">€<?php echo $c["price"]?></td>
    <td class="table__subtitle">
        <!-- <div class="card__body__block--large">
            <div class="card__count">
                    <span>1</span>
            </div>
            <div class="card__arrow--first">
                <a href="#"><img class="card__img--first" src="/images/arrow_icon.png"></a>
                <a href="#"><img class="card__img--second" src="/images/arrow_icon.png"></a>
            </div>
        </div> -->
        <span><?php echo $c["quantity"] ?></span>
    </td>
    <!-- <td class="table__subtitle--item"><?php //echo (1-$discountMultiplier)*100 ?>%</td> -->
    <td class="table__subtitle--item">€<span class="subtotal_item"><?php echo $c["price"]*$c["quantity"]//*$discountMultiplier ?></span></td>
    <!-- <td class="table__subtitle--item">
        <a href="#"><img class="table__image" src="/images/icons_vuilbak.png" alt="vuilbak"></a>
    </td> -->
  </tr>
  <?php endforeach; ?>
</table>


<ul class="list--large">
    <div class="list__second">
        <h2 class="list__subtitle">Totaal winkelmand</h2>
        <!-- <li class="list__item">Korting
            <ul class="list__second">
                <li class="list__item__second"><?php //echo (1-$discountMultiplier)*100 ?>%
            </ul>
        </li> -->
        <li class="list__item">Subtotaal
            <ul class="list__second">
                <li class="list__item__second">€<?php echo $subtotalOrder ?>
            </ul>
        </li>
        <li class="list__item">Verzending
            <ul class="list__second">
                <li class="list__item__second">€<?php echo $sendCost ?>
            </ul>
        </li>
    </div>
</ul>

<article class="card">
  <div class="card__header--switch">
    <div class="card__body--shop">
        <h2 class="card__subtitle--item">Totaal aankoop</h2>
        <h3 class="card__subtitle--item">Je hebt <?php echo $coupons_available-$coupons_used ?> kortingsbonnen van 20% per aankoop</h3>
        <!-- <a href="#" class="button__item--small">
            <span class="button__body">Een kortingsbon toepassen</span>
        </a> -->
        <form action="" method="POST">
            <div class="form-group--shop">
                <input type="checkbox" id="korting" name="apply_discount" value="Korting toepassen">
                <label class="form-group__label--shop" for="apply_discount">Korting toepassen</label>
            </div>
            <!-- <input class="button__code--small" type="submit" name="confirm_purchase" value="Aankoop bevestigen"> -->
    </div>
    <div class="card__body--shop">
            <h2 id="total_order" class="card__subtitle--item">€<?php echo $subtotalOrder*$discountMultiplier+$sendCost ?></h2>
            <input type="submit" name="clear_cart" class="button__item--shop" value="Winkelmand leegmaken">
            <!-- <span class="button__body">Winkelmand bijwerken</span> -->
        <!-- </input> -->
            <input name="confirm_purchase" type="submit" class="button__code--shop" value="Aankoop bevestigen">
            <!-- <span class="button__body">Betalen</span> -->
        </form>
            <!-- <input type="submit" name="clear_cart" value="Winkelmand leegmaken"> -->
    </div>
  </div>
</article>
<?php else: ?>
    <?php if(!empty($_POST["confirm_purchase"])): ?>
        <article class="card__shop--center">
            <div class="card__header__shop--center">
                <figure class="card__figure">
                    <a href="#"><img src="/images/7_AankoopGelukt.png" alt="aankoop-gelukt" class="card__image__print--center"></a>
                </figure>
                <h2 class="card__subtitle__shop--center">Jouw aankoop is gelukt!</h2>
                <a href="#" class="button__longtext">
                    <span class="button__body">Terug naar de winkel</span>
                </a>
            </div>
        </article>
    <?php else: ?>
        <article class="card__shop--center">
        <div class="card__header__shop--center">
            <h2 class="card__subtitle__shop--center">Jouw winkelmand is nog leeg</h2>
            <figure class="card__figure">
                <a href="#"><img src="/images/8_LegeWinkelmand.png" alt="lege-winkelmand" class="card__image__print--center"></a>
            </figure>
            <a href="#" class="button__longtext">
                <span class="button__body">Bekijk ons aanbod</span>
            </a>
        </div>
        </article>
    <?php endif; ?>
<?php endif; ?>

<?php include_once("inc/footer.inc.php"); ?>

</body>
</html>
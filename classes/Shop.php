<?php

include_once(__DIR__ . "/Db.php");

class Shop
{
    //----------TOEVOEGEN WINKELMAND----------

    public function getItemData($key){
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT * FROM ilya_products WHERE id=:id");
        $statement->bindValue(":id", $key);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    public function addToCart($quantity, $user_id, $key){
        $product_data = $this->getItemData($key);
        $product_id = $product_data[0][0];
        $conn = Db::getConnection();
        $statement = $conn->prepare("INSERT INTO ilya_cart (product_id, quantity, user_id) VALUES (:product_id, :quantity, :user_id)");
        $statement->bindValue(":product_id", $product_id);
        $statement->bindValue(":quantity", $quantity);
        $statement->bindValue(":user_id", $user_id);
        $statement->execute();
    }

    public function showCart($id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT * FROM ilya_cart join ilya_products ON ilya_cart.product_id = ilya_products.id");
        $statement->bindValue(":user_id", $id);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    //----------TOEVOEGEN AANKOOPGESCHIEDENIS----------

    public function getSubtotalOrder($id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT price, quantity FROM ilya_cart join ilya_products ON ilya_cart.product_id = ilya_products.id WHERE user_id = :user_id");
        $statement->bindValue(":user_id", $id);
        $statement->execute();
        $result = $statement->fetchAll();
        $subtotalArray = array();
        foreach($result as $key => $r):
            array_push($subtotalArray, $r["price"]*$r["quantity"]);
        endforeach;
        $subtotalOrder = array_sum($subtotalArray);
        return $subtotalOrder;
    }

    public function moveToHistory($cart_items, $key, $discount){
        $date = date("Y-m-d");
        $conn = Db::getConnection();
        $statement = $conn->prepare("INSERT INTO ilya_orders (product_id, quantity, date, discount, user_id) VALUES (:product_id, :quantity, :date, :discount, :user_id)");
        $statement->bindValue(":product_id", $cart_items[$key]["product_id"]);
        $statement->bindValue(":quantity", $cart_items[$key]["quantity"]);
        $statement->bindValue(":date", $date);
        $statement->bindValue(":discount", $discount);
        $statement->bindValue(":user_id", $cart_items[$key]["user_id"]);
        $statement->execute();
    }

    public function deleteFromCart($user_id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("DELETE FROM ilya_cart WHERE user_id = :user_id");
        $statement->bindValue(":user_id", $user_id);
        $statement->execute();
    }

    //----------PRINTS OVERZICHT----------

    public function allPrints(){
        $conn = Db::getConnection();
        $statement = $conn->query("SELECT * FROM ilya_products");
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    //----------AANBEVOLEN PRINTS----------

    public function recommendedPrints(){
        $conn = Db::getConnection();
        $statement = $conn->query("SELECT * FROM ilya_products LIMIT 5");
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    //----------DETAILPAGINAS----------

    public function productDetails($key){
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT * FROM ilya_products WHERE id = :id");
        $statement->bindValue(":id", $key);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
}
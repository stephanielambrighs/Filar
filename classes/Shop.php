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
        $statement->bindValue(":user_id", 1);
        $statement->execute();
    }

    //----------TOEVOEGEN AANKOOPGESCHIEDENIS----------



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
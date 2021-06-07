<?php

include_once(__DIR__ . "/Db.php");

class User
{   
    //----------PLASTIC TRACKER----------

    public function allDelivered(){
        $conn = Db::getConnection();
        $statement = $conn->query("SELECT delivered_plastic FROM plastic_tracker WHERE user_id = 1");
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    public function allDeliveredSum(){
        $array = $this->allDelivered();
        $deliveries = array();
        foreach($array as $a){
            array_push($deliveries, $a["delivered_plastic"]);
        }
        $arraySum = array_sum($deliveries);
        return $arraySum;
    }

    public function plasticTracker(){
        $totalPlastic = $this->allDeliveredSum();
        $currentPlastic = explode(".", $totalPlastic);
        return $currentPlastic;
    }

    //----------INLEVERGESCHIEDENIS----------

    public function deliveryHistory(){
        $conn = Db::getConnection();
        $statement = $conn->query("SELECT * FROM plastic_tracker WHERE user_id = 1 ORDER BY id DESC");
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    //----------AANKOOPGESCHIEDENIS----------

    public function purchaseHistory(){
        $conn = Db::getConnection();
        $statement = $conn->query("SELECT * FROM ilya_orders JOIN ilya_products ON ilya_orders.product_id = ilya_products.id WHERE ilya_orders.user_id = 1");
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
}
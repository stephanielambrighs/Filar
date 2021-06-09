<?php

include_once(__DIR__ . "/Db.php");


class Scanner
{   
    //----------PLASTIC TRACKER----------

    public function addPlastic($user_id, $amount, $method){
        $date = date("Y-m-d");
        $conn = Db::getConnection();
        $statement = $conn->prepare("INSERT INTO plastic_tracker (user_id, delivered_plastic, delivery_date, delivery_method, coupon_date) VALUES (:user_id, :delivered_plastic, :delivery_date, :delivery_method, :coupon_date)");
        $statement->bindValue(":user_id", $user_id);
        $statement->bindValue(":delivered_plastic", $amount);
        $statement->bindValue(":delivery_date", $date);
        $statement->bindValue(":delivery_method", $method);
        $statement->bindValue(":coupon_date", $date);
        $statement->execute();
    }
}